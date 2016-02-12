<?php
namespace Civix\FrontBundle\Menu;

use Symfony\Component\HttpFoundation\Request;
use Mopa\Bundle\BootstrapBundle\Navbar\AbstractNavbarMenuBuilder;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Civix\CoreBundle\Entity\Group;

/**
 * Class for build menu
 */
class MenuBuilder extends AbstractNavbarMenuBuilder
{
    protected $securityContext;
    protected $isLoggedIn;

    /**
     * @param FactoryInterface         $factory
     * @param SecurityContextInterface $securityContext
     */
    public function __construct(FactoryInterface $factory, SecurityContextInterface $securityContext)
    {
        parent::__construct($factory);

        $this->securityContext = $securityContext;
        $this->isLoggedIn = $this->securityContext->isGranted('IS_AUTHENTICATED_FULLY');
    }

     /**
     * @param Request $request
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function createMainMenu(Request $request)
    {
        $menu = $this->createNavbarMenuItem();

        if ($this->securityContext->isGranted('ROLE_REPRESENTATIVE')) {
            $menu->addChild("Home", array('route' => 'civix_front_representative'));

            $this->createPollsDropdownMenu($menu, 'representative');

            $profileDropdown = $this->createMainDropdownMenuItem($menu, 'Profile');
            $profileDropdown->addChild("Edit Profile", array('route' => 'civix_front_representative_edit_profile'))
                ->setExtras(array('routes' => array(
                    'civix_front_representative_edit_profile',
                    'civix_front_representative_update_profile'
                    )
                ));
            $profileDropdown->addChild(
                'Payment Information',
                array('route' => 'civix_front_representative_paymentsettings_index')
            )->setExtras(array('routes' => array(
                'civix_front_representative_paymentsettings_index',
            )));

            $this->createReportsDropDown($menu, 'representative');

            $menu->addChild("Incoming Answers", array('route' => 'civix_front_representative_incoming_answers'))
                ->setExtras(array('routes' =>
                    array(
                        'civix_front_representative_incoming_answers_details',
                        'civix_front_representative_incoming_answers'
                    )));

            $child = $menu->addChild("Petitions", array('route' => 'civix_front_representative_petition_index'))
                ->setExtras(array('routes' =>
                    array(
                        'civix_front_representative_petition_index',
                        'civix_front_representative_petition_new',
                        'civix_front_representative_petition_edit'
                    )));
            $this->addIcon($child, ['icon' => 'petition']);

            $child = $menu->addChild("Announcements", array('route' => 'civix_front_representative_announcement_index'))
                ->setExtras(array('routes' =>
                array(
                    'civix_front_representative_announcement_index',
                    'civix_front_representative_announcement_new',
                    'civix_front_representative_announcement_edit'
                )));
            $this->addIcon($child, ['icon' => 'alert']);

            $child = $menu->addChild("News", array('route' => 'civix_front_representative_news_index'))
                ->setExtras(array('routes' =>
                array(
                    'civix_front_representative_news_index',
                    'civix_front_representative_news_new',
                    'civix_front_representative_news_edit',
                    'civix_front_representative_news_details'
                )));
            $this->addIcon($child, ['icon' => 'discussion']);

            if ($this->securityContext->getToken()->getUser()->isLocalAdmin()) {
                $menu->addChild("Municipality", array('route' => 'civix_front_representative_municipal'));
            }
        } elseif ($this->securityContext->isGranted('ROLE_GROUP')) {
            $menu->addChild("Home", array('route' => 'civix_front_group_index'));

            $this->createPollsDropdownMenu($menu, 'group');

            $menu->addChild("Manage Users", array('route' => 'civix_front_group_members'))
                    ->setExtras(array('routes' =>
                    array('civix_front_group_manage_approvals',
                        'civix_front_group_members',
                        'civix_front_group_members_fields',
                        'civix_front_group_invite',
                        'civix_front_group_sections_index',
                        'civix_front_group_sections_new',
                        'civix_front_group_sections_edit',
                        'civix_front_group_sections_view',
                    )));
            $menu->addChild("MicroPetitions", array('route' => 'civix_front_petitions'))
                ->setExtras(array('routes' =>
                    array('civix_front_petitions_config',
                        'civix_front_petitions',
                        'civix_front_petitions_details')));
            $child = $menu->addChild("Petitions", array('route' => 'civix_front_group_petition_index'))
                ->setExtras(array('routes' =>
                    array(
                        'civix_front_group_petition_index',
                        'civix_front_group_petition_new',
                        'civix_front_group_petition_edit'
                    )));
            $this->addIcon($child, ['icon' => 'petition']);

            $child = $menu->addChild("Announcements", array('route' => 'civix_front_group_announcement_index'))
                ->setExtras(array('routes' =>
                array(
                    'civix_front_group_announcement_index',
                    'civix_front_group_announcement_new',
                    'civix_front_group_announcement_edit'
                )));
            $this->addIcon($child, ['icon' => 'alert']);

            $child = $menu->addChild("News", array('route' => 'civix_front_group_news_index'))
                ->setExtras(array('routes' =>
                    array(
                        'civix_front_group_news_index',
                        'civix_front_group_news_new',
                        'civix_front_group_news_edit',
                        'civix_front_group_news_details'
                    )));
            $this->addIcon($child, ['icon' => 'discussion']);

            $this->createReportsDropDown($menu, 'group');
          
            $profileDropdown = $this->createMainDropdownMenuItem($menu, 'Profile');
            $profileDropdown->addChild("Edit Profile", array('route' => 'civix_front_group_edit_profile'))
                ->setExtras(array('routes' =>
                    array('civix_front_group_edit_profile',
                        'civix_front_group_update_profile')));
            $profileDropdown->addChild('Settings', array('route' => 'civix_front_group_membership'))
                ->setExtras(array('routes' =>
                    array('civix_front_group_membership',
                        'civix_front_group_membership_save',
                        'civix_front_group_fields')));
        } elseif ($this->securityContext->isGranted('ROLE_SUPERUSER')) {
            $menu->addChild("Manage approvals", array('route' => 'civix_front_superuser_approvals'));
            $menu->addChild("Manage Users",
                array('route' => 'civix_front_superuser_manage_representatives'))
                ->setExtras(array('routes' =>
                    array('civix_front_superuser_manage_representatives',
                        'civix_front_superuser_manage_groups',
                        'civix_front_superuser_manage_users',
                        'civix_front_superuser_manage_limits')));
            $menu->addChild("State Groups",
                array('route' => 'civix_front_superuser_state_groups'));
            $menu->addChild("Local Groups",
                array('route' => 'civix_front_superuser_local_groups'))
                ->setExtras(array('routes' =>
                    array('civix_front_superuser_local_groups',
                        'civix_front_superuser_local_groups_assign',
                        'civix_front_superuser_local_groups_by_state')));
            $child = $menu->addChild("Questions", array('route' => 'civix_front_superuser_question_index'))
                ->setExtras(array('routes' =>
                    array('civix_front_superuser_question_index',
                        'civix_front_superuser_question_response',
                        'civix_front_superuser_question_archive',
                        'civix_front_superuser_question_details')));
            $this->addIcon($child, ['icon' => 'poll']);

            $menu->addChild("Blog", array('route' => 'civix_front_superuser_post_index'))
                ->setExtras(array('routes' => array(
                    'civix_front_superuser_post_index',
                    'civix_front_superuser_post_new',
                    'civix_front_superuser_post_edit')
                ));
            $menu->addChild("Discount", array('route' => 'civix_front_superuser_discount_index'));
            
            $this->createReportsDropDown($menu, 'superuser');
            
            $menu->addChild("Settings", array('route' => 'civix_front_superuser_settings_states'))
                ->setExtras(array('routes' => array(
                    'civix_front_superuser_settings_states'
                    ))
                );
        } else {
            $menu->addChild("Superuser", array('route' => 'civix_front_superuser'))
                ->setExtras(array('routes' =>
                    array('civix_front_superuser', 'civix_front_superuser_login')));
            $menu->addChild("Representative", array('route' => 'civix_front_representative'))
                ->setExtras(array('routes' =>
                    array('civix_front_representative',
                        'civix_front_representative_login',
                        'civix_front_representative_registration')));
            $menu->addChild("Non Governement Group", array('route' => 'civix_front_group_index'))
                ->setExtras(array('routes' =>
                    array('civix_front_group_index',
                        'civix_front_group_login',
                        'civix_front_group_registration')));
            $menu->addChild("Help/About", array('route' => 'civix_front_help'));
        }

        return $menu;
    }

    /**
     * @param Request $request
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function createQuestionMenu(Request $request)
    {
        $menu = $this->createSubnavbarMenuItem();
        $menu->setChildrenAttribute('class', 'nav nav-tabs');

        if ($this->securityContext->isGranted('ROLE_REPRESENTATIVE')) {
            $menu->addChild('New Question', array('route' => 'civix_front_representative_question_index'));
            $menu->addChild('Sending out response', array('route' => 'civix_front_representative_question_response'));
            $menu->addChild('Question Archive', array('route' => 'civix_front_representative_question_archive'));
        } elseif ($this->securityContext->isGranted('ROLE_GROUP')) {
            $menu->addChild('New Question', array('route' => 'civix_front_group_question_index'));
            $menu->addChild('Sending out response', array('route' => 'civix_front_group_question_response'));
            $menu->addChild('Question Archive', array('route' => 'civix_front_group_question_archive'));
        } elseif ($this->securityContext->isGranted('ROLE_SUPERUSER')) {
            $menu->addChild('New Question', array('route' => 'civix_front_superuser_question_index'));
            $menu->addChild('Sending out response', array('route' => 'civix_front_superuser_question_response'));
            $menu->addChild('Question Archive', array('route' => 'civix_front_superuser_question_archive'));
        }

        return $menu;
    }

    /**
     * @param Request $request
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function createPetitionMenu(Request $request)
    {
        $menu = $this->createSubnavbarMenuItem();
        $menu->setChildrenAttribute('class', 'nav nav-pills pull-right');

        if ($this->securityContext->isGranted('ROLE_REPRESENTATIVE')) {
            $menu->addChild('Create New Petition', array('route' => 'civix_front_representative_petition_new'));
        } elseif ($this->securityContext->isGranted('ROLE_GROUP')) {
            $menu->addChild('Create New Petition', array('route' => 'civix_front_group_petition_new'));
        }

        return $menu;
    }

    /**
     * @param Request $request
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function createManageMenu(Request $request)
    {
        $menu = $this->createSubnavbarMenuItem();
        $menu->setChildrenAttribute('class', 'nav nav-tabs');

        if ($this->securityContext->isGranted('ROLE_SUPERUSER')) {
            $menu->addChild('Manage Representatives', array('route' => 'civix_front_superuser_manage_representatives'));
            $menu->addChild('Manage Groups', array('route' => 'civix_front_superuser_manage_groups'));
            $menu->addChild('Manage Users', array('route' => 'civix_front_superuser_manage_users'));
            $menu->addChild('Manage Limits', array('route' => 'civix_front_superuser_manage_limits'));
        }

        return $menu;
    }

    /**
     * @param Request $request
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function createMicroPetitionMenu(Request $request)
    {
        $menu = $this->createSubnavbarMenuItem();
        $menu->setChildrenAttribute('class', 'nav nav-tabs');

        if ($this->securityContext->isGranted('ROLE_GROUP')) {
            $menu->addChild('Archive', array('route' => 'civix_front_petitions'))
                ->setExtras(array('routes' =>
                array('civix_front_petitions', 'civix_front_petitions_details')));
            $menu->addChild('Open', array('route' => 'civix_front_petitions_open'));
            $menu->addChild('Configuration', array('route' => 'civix_front_petitions_config'));
        }

        return $menu;
    }

    /**
     * @param Request $request
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function createSettingsMenu(Request $request)
    {
        $menu = $this->createSubnavbarMenuItem();
        $menu->setChildrenAttribute('class', 'nav nav-tabs');

        if ($this->securityContext->isGranted('ROLE_GROUP')) {
            $menu->addChild('Membership Control', ['route' => 'civix_front_group_membership']);
            $menu->addChild('Required fields', ['route' => 'civix_front_group_fields']);
            $menu->addChild('Payment Information', ['route' => 'civix_front_group_paymentsettings_index']);
            $menu->addChild('Permissions', ['route' => 'civix_front_group_permissionsettings_index']);
        }

        return $menu;
    }

    /**
     * @param Request $request
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function createGroupUserMenu()
    {
        $menu = $this->createSubnavbarMenuItem();
        $menu->setChildrenAttribute('class', 'nav nav-tabs');

        if ($this->securityContext->isGranted('ROLE_GROUP')) {
            if ($this->securityContext->getToken()->getUser()->getMembershipControl() ==
                Group::GROUP_MEMBERSHIP_APPROVAL
            ) {
                $menu->addChild('Manage approvals', array('route' => 'civix_front_group_manage_approvals'));
            }
            $menu->addChild('Group\'s members', array('route' => 'civix_front_group_members'));
            $menu->addChild('Invites', array('route' => 'civix_front_group_invite'));
            $menu->addChild("Sections", array('route' => 'civix_front_group_sections_index'))
                ->setExtras(array('routes' =>
                    array('civix_front_group_sections_index',
                        'civix_front_group_sections_new',
                        'civix_front_group_sections_edit',
                        'civix_front_group_sections_view',
                    )));
        }

        return $menu;
    }
    
    /**
     * @param Request $request
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function createQuestionOptions(Request $request)
    {
        $menu = $this->createSubnavbarMenuItem();
        $menu->setChildrenAttribute('class', 'nav nav-pills pull-right');

        if ($this->securityContext->isGranted('ROLE_REPRESENTATIVE')) {
            $menu->addChild('Create New Question', ['route' => 'civix_front_representative_question_new']);
        } elseif ($this->securityContext->isGranted('ROLE_GROUP')) {
            $menu->addChild('Create Question', ['route' => 'civix_front_group_question_new']);
        } elseif ($this->securityContext->isGranted('ROLE_SUPERUSER')) {
            $menu->addChild('Create New Question', ['route' => 'civix_front_superuser_question_new']);
        }

        return $menu;
    }

    private function createPollsDropdownMenu(ItemInterface $menu, $type)
    {
        $dropdown = $this->createMainDropdownMenuItem($menu, 'Polls', null, ['icon' => 'poll']);
        $dropdown->addChild("Question", array('route' => 'civix_front_' . $type . '_question_index'))
            ->setExtras(['routes' =>
                [
                    'civix_front_' . $type . '_question_index',
                    'civix_front_' . $type . '_question_response',
                    'civix_front_' . $type . '_question_archive',
                    'civix_front_' . $type . '_question_details'
                ]
            ]);
        $dropdown->addChild("Payment Request", ['route' => 'civix_front_' . $type . '_paymentrequest_index'])
            ->setExtras(['routes' =>
                [
                    'civix_front_' . $type . '_paymentrequest_index',
                    'civix_front_' . $type . '_paymentrequest_edit',
                    'civix_front_' . $type . '_paymentrequest_new'
                ]
            ]);
        $dropdown->addChild("Event", ['route' => 'civix_front_' . $type . '_leaderevent_index'])
            ->setExtras(['routes' =>
                [
                    'civix_front_' . $type . '_leaderevent_index',
                    'civix_front_' . $type . '_leaderevent_new',
                    'civix_front_' . $type . '_leaderevent_edit',
                ]]);
    }

    private function createReportsDropDown(ItemInterface $menu, $type)
    {
        $dropdown = $this->createMainDropdownMenuItem($menu, 'Reports', null, ['icon' => 'report']);
        $dropdown->addChild('Question', ['route' => 'civix_front_' . $type . '_report_index'])
            ->setExtras(['routes' =>
                [
                    'civix_front_' . $type . '_report_index',
                    'civix_front_' . $type . '_report_question'
                ]
            ]);
        if ($this->securityContext->isGranted('ROLE_REPRESENTATIVE') || $this->securityContext->isGranted('ROLE_GROUP')) {
            $dropdown->addChild("Payment Request", ['route' => 'civix_front_' . $type . '_report_payments'])
                ->setExtras(['routes' =>
                    [
                        'civix_front_' . $type . '_report_payments',
                        'civix_front_' . $type . '_report_payment',
                    ]
                ]);
            
            $dropdown->addChild('Event', ['route' => 'civix_front_' . $type . '_report_events'])
                ->setExtras(['routes' =>
                    [
                        'civix_front_' . $type . '_report_events',
                        'civix_front_' . $type . '_report_event',
                    ]
                ]);
        }
        if ($this->securityContext->isGranted('ROLE_GROUP')) {
            $dropdown->addChild("Membership", ['route' => 'civix_front_' . $type . '_report_membership'])
                ->setExtras(['routes' =>
                    [
                        'civix_front_' . $type . '_report_membership',
                    ]
                ]);
        }
    }

    protected function createMainDropdownMenuItem(ItemInterface $rootItem, $title, $push_right = true, $icon = array(), $knp_item_options=array())
    {
        $rootItem
            ->setAttribute('class', 'nav navbar-nav')
        ;
        if ($push_right) {
            $this->pushRight($rootItem);
        }
        $dropdown = $rootItem->addChild($title, array_merge(array('uri'=>'#'), $knp_item_options))
            ->setLinkattribute('class', 'dropdown-main-toggle')
            ->setLinkattribute('data-toggle', 'dropdown')
            ->setAttribute('class', 'dropdown-main')
            ->setChildrenAttribute('class', 'dropdown-main-menu')
        ;

        // TODO: make XSS safe $icon contents escaping
        switch(true){
            case isset($icon['icon'])||isset($icon['glyphicon']):
                $this->addIcon($dropdown, $icon);
                break;
            case isset($icon['caret']) && $icon['caret'] === true:
                $this->addCaret($dropdown, $icon);
        }

        return $dropdown;
    }
}
