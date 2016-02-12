<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/api')) {
            if (0 === strpos($pathinfo, '/api/a')) {
                if (0 === strpos($pathinfo, '/api/activit')) {
                    // api_activity_index
                    if (rtrim($pathinfo, '/') === '/api/activity') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_activity_index;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'api_activity_index');
                        }

                        return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\ActivityController::indexAction',  '_format' => 'json',  '_route' => 'api_activity_index',);
                    }
                    not_api_activity_index:

                    if (0 === strpos($pathinfo, '/api/activities')) {
                        // civix_api_activity_list
                        if (rtrim($pathinfo, '/') === '/api/activities') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_api_activity_list;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'civix_api_activity_list');
                            }

                            return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\ActivityController::listAction',  '_format' => 'json',  '_route' => 'civix_api_activity_list',);
                        }
                        not_civix_api_activity_list:

                        // civix_api_activity_saveread
                        if ($pathinfo === '/api/activities/read/') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_civix_api_activity_saveread;
                            }

                            return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\ActivityController::saveReadAction',  '_format' => 'json',  '_route' => 'civix_api_activity_saveread',);
                        }
                        not_civix_api_activity_saveread:

                    }

                }

                // api_announcements
                if ($pathinfo === '/api/announcements') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_announcements;
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\AnnouncementController::listAction',  '_format' => 'json',  '_route' => 'api_announcements',);
                }
                not_api_announcements:

            }

            // api_petition_answer_unsign
            if (0 === strpos($pathinfo, '/api/petition') && preg_match('#^/api/petition/(?P<id>[^/]++)/answers/(?P<answerId>\\d+)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_api_petition_answer_unsign;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_petition_answer_unsign')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\AnswersController::unsignPetitionAnswerAction',  '_format' => 'json',));
            }
            not_api_petition_answer_unsign:

            // api_micro_petition_answer_unsign
            if (0 === strpos($pathinfo, '/api/micro-petitions') && preg_match('#^/api/micro\\-petitions/(?P<id>[^/]++)/answers/(?P<answerId>\\d+)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_api_micro_petition_answer_unsign;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_micro_petition_answer_unsign')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\AnswersController::unsignMicroPetitionsAnswerAction',  '_format' => 'json',));
            }
            not_api_micro_petition_answer_unsign:

            if (0 === strpos($pathinfo, '/api/answers')) {
                // civix_api_answers_paymenthistory
                if (0 === strpos($pathinfo, '/api/answers/payment-history') && preg_match('#^/api/answers/payment\\-history/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_api_answers_paymenthistory;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_api_answers_paymenthistory')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\AnswersController::paymentHistory',  '_format' => 'json',));
                }
                not_civix_api_answers_paymenthistory:

                // civix_api_answers_charges
                if (preg_match('#^/api/answers/(?P<id>[^/]++)/charges/?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_api_answers_charges;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'civix_api_answers_charges');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_api_answers_charges')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\AnswersController::charges',  '_format' => 'json',));
                }
                not_civix_api_answers_charges:

            }

            if (0 === strpos($pathinfo, '/api/cards')) {
                // civix_api_cards_add
                if ($pathinfo === '/api/cards/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_civix_api_cards_add;
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\CardsController::add',  '_format' => 'json',  '_route' => 'civix_api_cards_add',);
                }
                not_civix_api_cards_add:

                // civix_api_cards_listcards
                if (rtrim($pathinfo, '/') === '/api/cards') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_api_cards_listcards;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'civix_api_cards_listcards');
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\CardsController::listCards',  '_format' => 'json',  '_route' => 'civix_api_cards_listcards',);
                }
                not_civix_api_cards_listcards:

                // civix_api_cards_removecard
                if (preg_match('#^/api/cards/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_civix_api_cards_removecard;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_api_cards_removecard')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\CardsController::removeCard',  '_format' => 'json',));
                }
                not_civix_api_cards_removecard:

            }

            // api_comments
            if (preg_match('#^/api/(?P<typeEntity>poll|micro-petitions)/(?P<entityId>\\d+)/comments/?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_api_comments;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'api_comments');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_comments')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\CommentController::getCommentsAction',  '_format' => 'json',));
            }
            not_api_comments:

            // api_comments_add
            if (preg_match('#^/api/(?P<typeEntity>poll|micro-petitions)/(?P<entityId>\\d+)/comments/$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_api_comments_add;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_comments_add')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\CommentController::addCommentAction',  '_format' => 'json',));
            }
            not_api_comments_add:

            if (0 === strpos($pathinfo, '/api/poll/comments')) {
                // api_question_comments
                if (preg_match('#^/api/poll/comments/(?P<questionId>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_question_comments;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_question_comments')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\CommentController::commentsByQuestionAction',  '_format' => 'json',));
                }
                not_api_question_comments:

                // api_question_add_comment
                if (0 === strpos($pathinfo, '/api/poll/comments/add') && preg_match('#^/api/poll/comments/add/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_api_question_add_comment;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_question_add_comment')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\CommentController::addCommentToQuestion',  '_format' => 'json',));
                }
                not_api_question_add_comment:

            }

            if (0 === strpos($pathinfo, '/api/endpoints')) {
                // api_endpoints_get
                if (rtrim($pathinfo, '/') === '/api/endpoints') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_endpoints_get;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_endpoints_get');
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\EndpointController::getAction',  '_format' => 'json',  '_route' => 'api_endpoints_get',);
                }
                not_api_endpoints_get:

                // api_endpoints_create
                if ($pathinfo === '/api/endpoints/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_api_endpoints_create;
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\EndpointController::createAction',  '_format' => 'json',  '_route' => 'api_endpoints_create',);
                }
                not_api_endpoints_create:

            }

            if (0 === strpos($pathinfo, '/api/follow')) {
                // civix_api_follow_get
                if (rtrim($pathinfo, '/') === '/api/follow') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_api_follow_get;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'civix_api_follow_get');
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\FollowController::getAction',  '_format' => 'json',  '_route' => 'civix_api_follow_get',);
                }
                not_civix_api_follow_get:

                // civix_api_follow_post
                if ($pathinfo === '/api/follow/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_civix_api_follow_post;
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\FollowController::postAction',  '_format' => 'json',  '_route' => 'civix_api_follow_post',);
                }
                not_civix_api_follow_post:

                // civix_api_follow_put
                if (preg_match('#^/api/follow/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_civix_api_follow_put;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_api_follow_put')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\FollowController::putAction',  '_format' => 'json',));
                }
                not_civix_api_follow_put:

                // civix_api_follow_delete
                if (preg_match('#^/api/follow/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_civix_api_follow_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_api_follow_delete')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\FollowController::deleteAction',  '_format' => 'json',));
                }
                not_civix_api_follow_delete:

            }

            if (0 === strpos($pathinfo, '/api/groups')) {
                // api_groups
                if (rtrim($pathinfo, '/') === '/api/groups') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_groups;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_groups');
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\GroupController::getGroupsAction',  '_format' => 'json',  '_route' => 'api_groups',);
                }
                not_api_groups:

                // civix_api_group_creategroup
                if ($pathinfo === '/api/groups/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_civix_api_group_creategroup;
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\GroupController::createGroupAction',  '_format' => 'json',  '_route' => 'civix_api_group_creategroup',);
                }
                not_civix_api_group_creategroup:

                // civix_api_group_getusergroups
                if (rtrim($pathinfo, '/') === '/api/groups/user-groups') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_api_group_getusergroups;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'civix_api_group_getusergroups');
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\GroupController::getUserGroupsAction',  '_format' => 'json',  '_route' => 'civix_api_group_getusergroups',);
                }
                not_civix_api_group_getusergroups:

                // api_popular_groups
                if ($pathinfo === '/api/groups/popular') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_popular_groups;
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\GroupController::getPopularGroupsAction',  '_format' => 'json',  '_route' => 'api_popular_groups',);
                }
                not_api_popular_groups:

                // api_new_groups
                if ($pathinfo === '/api/groups/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_new_groups;
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\GroupController::getNewGroupsAction',  '_format' => 'json',  '_route' => 'api_new_groups',);
                }
                not_api_new_groups:

                if (0 === strpos($pathinfo, '/api/groups/join')) {
                    // api_groups_join
                    if (preg_match('#^/api/groups/join/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_api_groups_join;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_groups_join')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\GroupController::joinToGroupAction',  '_format' => 'json',));
                    }
                    not_api_groups_join:

                    // api_groups_unjoin
                    if (preg_match('#^/api/groups/join/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_api_groups_unjoin;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_groups_unjoin')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\GroupController::unjoinFromGroup',  '_format' => 'json',));
                    }
                    not_api_groups_unjoin:

                }

                if (0 === strpos($pathinfo, '/api/groups/in')) {
                    // api_group_information
                    if (0 === strpos($pathinfo, '/api/groups/info') && preg_match('#^/api/groups/info/(?P<group>\\d+)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_group_information;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_group_information')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\GroupController::getInformationAction',  '_format' => 'json',));
                    }
                    not_api_group_information:

                    if (0 === strpos($pathinfo, '/api/groups/invites')) {
                        // api_group_invites
                        if ($pathinfo === '/api/groups/invites') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_api_group_invites;
                            }

                            return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\GroupController::getInvitesAction',  '_format' => 'json',  '_route' => 'api_group_invites',);
                        }
                        not_api_group_invites:

                        // api_group_invites_approval
                        if (preg_match('#^/api/groups/invites/(?P<status>approve|reject)/(?P<group>\\d+)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_api_group_invites_approval;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_group_invites_approval')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\GroupController::invitesApprovalAction',  '_format' => 'json',));
                        }
                        not_api_group_invites_approval:

                    }

                }

                // api_group_fields
                if (preg_match('#^/api/groups/(?P<group>\\d+)/fields$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_group_fields;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_group_fields')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\GroupController::getGroupRequiredFields',  '_format' => 'json',));
                }
                not_api_group_fields:

            }

            if (0 === strpos($pathinfo, '/api/invites')) {
                // civix_api_invite_get
                if (rtrim($pathinfo, '/') === '/api/invites') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_api_invite_get;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'civix_api_invite_get');
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\InviteController::getAction',  '_format' => 'json',  '_route' => 'civix_api_invite_get',);
                }
                not_civix_api_invite_get:

                // civix_api_invite_create
                if ($pathinfo === '/api/invites/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_civix_api_invite_create;
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\InviteController::createAction',  '_format' => 'json',  '_route' => 'civix_api_invite_create',);
                }
                not_civix_api_invite_create:

                // civix_api_invite_remove
                if (preg_match('#^/api/invites/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_civix_api_invite_remove;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_api_invite_remove')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\InviteController::removeAction',  '_format' => 'json',));
                }
                not_civix_api_invite_remove:

            }

            if (0 === strpos($pathinfo, '/api/micro-petitions')) {
                // api_micropetition_create
                if ($pathinfo === '/api/micro-petitions') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_api_micropetition_create;
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\MicropetitionController::createPetitionAction',  '_format' => 'json',  '_route' => 'api_micropetition_create',);
                }
                not_api_micropetition_create:

                // api_micropetition_list
                if ($pathinfo === '/api/micro-petitions') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_micropetition_list;
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\MicropetitionController::getListMicropetitions',  '_format' => 'json',  '_route' => 'api_micropetition_list',);
                }
                not_api_micropetition_list:

                // api_get_micropetitions
                if (rtrim($pathinfo, '/') === '/api/micro-petitions') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_get_micropetitions;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_get_micropetitions');
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\MicropetitionController::getMicropetitions',  '_format' => 'json',  '_route' => 'api_get_micropetitions',);
                }
                not_api_get_micropetitions:

                // api_micropetition_info
                if (preg_match('#^/api/micro\\-petitions/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_micropetition_info;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_micropetition_info')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\MicropetitionController::getMicropetition',  '_format' => 'json',));
                }
                not_api_micropetition_info:

                // api_micropetition_choice
                if (preg_match('#^/api/micro\\-petitions/(?P<id>\\d+)/answers/(?P<option_id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_api_micropetition_choice;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_micropetition_choice')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\MicropetitionController::choiceMicropetition',  '_format' => 'json',));
                }
                not_api_micropetition_choice:

                // civix_api_micropetition_answers
                if (rtrim($pathinfo, '/') === '/api/micro-petitions/answers') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_api_micropetition_answers;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'civix_api_micropetition_answers');
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\MicropetitionController::answersAction',  '_format' => 'json',  '_route' => 'civix_api_micropetition_answers',);
                }
                not_civix_api_micropetition_answers:

            }

            // civix_api_permission_permissions
            if (0 === strpos($pathinfo, '/api/groups') && preg_match('#^/api/groups/(?P<id>\\d+)/permissions$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_civix_api_permission_permissions;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_api_permission_permissions')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\PermissionController::permissionsAction',  '_format' => 'json',));
            }
            not_civix_api_permission_permissions:

            if (0 === strpos($pathinfo, '/api/p')) {
                if (0 === strpos($pathinfo, '/api/poll')) {
                    if (0 === strpos($pathinfo, '/api/poll/question')) {
                        // api_question_get
                        if (preg_match('#^/api/poll/question/(?P<question_id>\\d+)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_api_question_get;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_question_get')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\PollController::questionGetAction',  '_format' => 'json',));
                        }
                        not_api_question_get:

                        // api_question_get_by_representative
                        if (0 === strpos($pathinfo, '/api/poll/question/representative') && preg_match('#^/api/poll/question/representative/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_api_question_get_by_representative;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_question_get_by_representative')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\PollController::questionGetByRepresentativeAction',  '_format' => 'json',));
                        }
                        not_api_question_get_by_representative:

                        // api_question_get_by_group
                        if (0 === strpos($pathinfo, '/api/poll/question/group') && preg_match('#^/api/poll/question/group/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_api_question_get_by_group;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_question_get_by_group')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\PollController::questionGetByGroupAction',  '_format' => 'json',));
                        }
                        not_api_question_get_by_group:

                        // api_question_answers_influence
                        if (preg_match('#^/api/poll/question/(?P<question>\\d+)/answers/influence$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_api_question_answers_influence;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_question_answers_influence')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\PollController::answersByInfluenceAction',  '_format' => 'json',));
                        }
                        not_api_question_answers_influence:

                        // api_question_answers_influence_outside
                        if (preg_match('#^/api/poll/question/(?P<question>\\d+)/answers/influence/outside$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_api_question_answers_influence_outside;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_question_answers_influence_outside')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\PollController::answersByOutsideInfluenceAction',  '_format' => 'json',));
                        }
                        not_api_question_answers_influence_outside:

                        // api_answer_add
                        if (preg_match('#^/api/poll/question/(?P<question_id>\\d+)/answer/add$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_api_answer_add;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_answer_add')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\PollController::answerAddAction',  '_format' => 'json',));
                        }
                        not_api_answer_add:

                    }

                    // api_question_rate_comment
                    if (0 === strpos($pathinfo, '/api/poll/comments/rate') && preg_match('#^/api/poll/comments/rate/(?P<id>\\d+)/(?P<action>up|down|delete)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_api_question_rate_comment;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_question_rate_comment')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\PollController::rateCommentAction',  '_format' => 'json',));
                    }
                    not_api_question_rate_comment:

                    // civix_api_poll_answers
                    if (rtrim($pathinfo, '/') === '/api/poll/answers') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_api_poll_answers;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'civix_api_poll_answers');
                        }

                        return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\PollController::answersAction',  '_format' => 'json',  '_route' => 'civix_api_poll_answers',);
                    }
                    not_civix_api_poll_answers:

                }

                if (0 === strpos($pathinfo, '/api/profile')) {
                    // api_profile_index
                    if ($pathinfo === '/api/profile') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_profile_index;
                        }

                        return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\ProfileController::indexAction',  '_format' => 'json',  '_route' => 'api_profile_index',);
                    }
                    not_api_profile_index:

                    // api_profile_information
                    if (0 === strpos($pathinfo, '/api/profile/info') && preg_match('#^/api/profile/info/(?P<user>\\d+)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_profile_information;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_profile_information')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\ProfileController::getInformationAction',  '_format' => 'json',));
                    }
                    not_api_profile_information:

                    // api_profile_follow_unfollow
                    if (0 === strpos($pathinfo, '/api/profile/follow') && preg_match('#^/api/profile/follow/(?P<status>follow|unfollow|active|reject)/(?P<targetUser>\\d+)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_api_profile_follow_unfollow;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_profile_follow_unfollow')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\ProfileController::followAction',  '_format' => 'json',));
                    }
                    not_api_profile_follow_unfollow:

                    // civix_api_profile_getwaitingfollowers
                    if ($pathinfo === '/api/profile/waiting-followers') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_api_profile_getwaitingfollowers;
                        }

                        return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\ProfileController::getWaitingFollowersAction',  '_format' => 'json',  '_route' => 'civix_api_profile_getwaitingfollowers',);
                    }
                    not_civix_api_profile_getwaitingfollowers:

                    if (0 === strpos($pathinfo, '/api/profile/follow')) {
                        // civix_api_profile_getmyfollowers
                        if ($pathinfo === '/api/profile/followers') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_api_profile_getmyfollowers;
                            }

                            return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\ProfileController::getMyFollowers',  '_format' => 'json',  '_route' => 'civix_api_profile_getmyfollowers',);
                        }
                        not_civix_api_profile_getmyfollowers:

                        if (0 === strpos($pathinfo, '/api/profile/following')) {
                            // civix_api_profile_getmyfollowing
                            if ($pathinfo === '/api/profile/following') {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_civix_api_profile_getmyfollowing;
                                }

                                return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\ProfileController::getMyFollowing',  '_format' => 'json',  '_route' => 'civix_api_profile_getmyfollowing',);
                            }
                            not_civix_api_profile_getmyfollowing:

                            // civix_api_profile_getfollowingbyuser
                            if (preg_match('#^/api/profile/following/(?P<targetUser>[^/]++)$#s', $pathinfo, $matches)) {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_civix_api_profile_getfollowingbyuser;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_api_profile_getfollowingbyuser')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\ProfileController::getFollowingByUser',  '_format' => 'json',));
                            }
                            not_civix_api_profile_getfollowingbyuser:

                        }

                    }

                    // civix_api_profile_getlastapprovedfollowing
                    if ($pathinfo === '/api/profile/last-following') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_api_profile_getlastapprovedfollowing;
                        }

                        return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\ProfileController::getLastApprovedFollowing',  '_format' => 'json',  '_route' => 'civix_api_profile_getlastapprovedfollowing',);
                    }
                    not_civix_api_profile_getlastapprovedfollowing:

                    // api_profile_update
                    if ($pathinfo === '/api/profile/update') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_api_profile_update;
                        }

                        return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\ProfileController::updateAction',  '_format' => 'json',  '_route' => 'api_profile_update',);
                    }
                    not_api_profile_update:

                    // api_profile_settings
                    if ($pathinfo === '/api/profile/settings') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_api_profile_settings;
                        }

                        return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\ProfileController::updateSettings',  '_format' => 'json',  '_route' => 'api_profile_settings',);
                    }
                    not_api_profile_settings:

                    // api_profile_facebook_friends
                    if ($pathinfo === '/api/profile/facebook-friends') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_api_profile_facebook_friends;
                        }

                        return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\ProfileController::getMyFacebookFriends',  '_format' => 'json',  '_route' => 'api_profile_facebook_friends',);
                    }
                    not_api_profile_facebook_friends:

                    // api_profile_link_to_facebook
                    if ($pathinfo === '/api/profile/link-to-facebook') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_api_profile_link_to_facebook;
                        }

                        return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\ProfileController::linkToFacebook',  '_format' => 'json',  '_route' => 'api_profile_link_to_facebook',);
                    }
                    not_api_profile_link_to_facebook:

                }

            }

            if (0 === strpos($pathinfo, '/api/representatives')) {
                // api_my_representatives
                if (rtrim($pathinfo, '/') === '/api/representatives') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_my_representatives;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_my_representatives');
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\RepresentativeController::getMyRepresentativesAction',  '_format' => 'json',  '_route' => 'api_my_representatives',);
                }
                not_api_my_representatives:

                if (0 === strpos($pathinfo, '/api/representatives/info')) {
                    // api_representative_information
                    if (preg_match('#^/api/representatives/info/(?P<representative_id>\\d+)/(?P<storage_id>\\d+)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_representative_information;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_representative_information')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\RepresentativeController::getInformationAction',  '_format' => 'json',));
                    }
                    not_api_representative_information:

                    // api_representative_committee
                    if (0 === strpos($pathinfo, '/api/representatives/info/committee') && preg_match('#^/api/representatives/info/committee/(?P<storage_id>\\d+)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_representative_committee;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_representative_committee')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\RepresentativeController::getCommitteeInfo',  '_format' => 'json',));
                    }
                    not_api_representative_committee:

                    // api_representative_sponsored_bills
                    if (0 === strpos($pathinfo, '/api/representatives/info/sponsored-bills') && preg_match('#^/api/representatives/info/sponsored\\-bills/(?P<storage_id>\\d+)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_representative_sponsored_bills;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_representative_sponsored_bills')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\RepresentativeController::getSponsoredBills',  '_format' => 'json',));
                    }
                    not_api_representative_sponsored_bills:

                }

            }

            if (0 === strpos($pathinfo, '/api/s')) {
                if (0 === strpos($pathinfo, '/api/se')) {
                    if (0 === strpos($pathinfo, '/api/search')) {
                        // api_search
                        if ($pathinfo === '/api/search') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_api_search;
                            }

                            return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\SearchController::getGroupsAction',  '_format' => 'json',  '_route' => 'api_search',);
                        }
                        not_api_search:

                        // api_search_hash_tag
                        if ($pathinfo === '/api/search/by-hash-tags') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_api_search_hash_tag;
                            }

                            return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\SearchController::findByHashTag',  '_format' => 'json',  '_route' => 'api_search_hash_tag',);
                        }
                        not_api_search_hash_tag:

                    }

                    if (0 === strpos($pathinfo, '/api/secure')) {
                        // api_secure_login
                        if ($pathinfo === '/api/secure/login') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_api_secure_login;
                            }

                            return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\SecureController::indexAction',  '_format' => 'json',  '_route' => 'api_secure_login',);
                        }
                        not_api_secure_login:

                        // api_secure_facebook_login
                        if ($pathinfo === '/api/secure/facebook/login') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_api_secure_facebook_login;
                            }

                            return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\SecureController::facebookLogin',  '_format' => 'json',  '_route' => 'api_secure_facebook_login',);
                        }
                        not_api_secure_facebook_login:

                        if (0 === strpos($pathinfo, '/api/secure/registration')) {
                            // api_secure_registration
                            if ($pathinfo === '/api/secure/registration') {
                                if ($this->context->getMethod() != 'POST') {
                                    $allow[] = 'POST';
                                    goto not_api_secure_registration;
                                }

                                return array (  'validatorGroups' => NULL,  '_controller' => 'Civix\\ApiBundle\\Controller\\SecureController::registrationAction',  '_format' => 'json',  '_route' => 'api_secure_registration',);
                            }
                            not_api_secure_registration:

                            // api_secure_facebook_register
                            if ($pathinfo === '/api/secure/registration-facebook') {
                                if ($this->context->getMethod() != 'POST') {
                                    $allow[] = 'POST';
                                    goto not_api_secure_facebook_register;
                                }

                                return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\SecureController::facebookRegistration',  '_format' => 'json',  '_route' => 'api_secure_facebook_register',);
                            }
                            not_api_secure_facebook_register:

                        }

                        // api_secure_forgot_password
                        if ($pathinfo === '/api/secure/forgot-password') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_api_secure_forgot_password;
                            }

                            return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\SecureController::forgotPassword',  '_format' => 'json',  '_route' => 'api_secure_forgot_password',);
                        }
                        not_api_secure_forgot_password:

                        if (0 === strpos($pathinfo, '/api/secure/resettoken')) {
                            // api_secure_check_token
                            if (preg_match('#^/api/secure/resettoken/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_api_secure_check_token;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_secure_check_token')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\SecureController::checkResetToken',  '_format' => 'json',));
                            }
                            not_api_secure_check_token:

                            // api_secure_password_update
                            if (preg_match('#^/api/secure/resettoken/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                                if ($this->context->getMethod() != 'POST') {
                                    $allow[] = 'POST';
                                    goto not_api_secure_password_update;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_secure_password_update')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\SecureController::saveNewPassword',  '_format' => 'json',));
                            }
                            not_api_secure_password_update:

                        }

                        // api_beta_request
                        if ($pathinfo === '/api/secure/beta') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_api_beta_request;
                            }

                            return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\SecureController::betaRequest',  '_format' => 'json',  '_route' => 'api_beta_request',);
                        }
                        not_api_beta_request:

                    }

                }

                if (0 === strpos($pathinfo, '/api/social-activities')) {
                    // civix_api_socialactivity_list
                    if (rtrim($pathinfo, '/') === '/api/social-activities') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_api_socialactivity_list;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'civix_api_socialactivity_list');
                        }

                        return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\SocialActivityController::listAction',  '_format' => 'json',  '_route' => 'civix_api_socialactivity_list',);
                    }
                    not_civix_api_socialactivity_list:

                    // civix_api_socialactivity_remove
                    if (preg_match('#^/api/social\\-activities/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_civix_api_socialactivity_remove;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_api_socialactivity_remove')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\SocialActivityController::removeAction',  '_format' => 'json',));
                    }
                    not_civix_api_socialactivity_remove:

                    // civix_api_socialactivity_put
                    if (preg_match('#^/api/social\\-activities/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_civix_api_socialactivity_put;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_api_socialactivity_put')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\SocialActivityController::putAction',  '_format' => 'json',));
                    }
                    not_civix_api_socialactivity_put:

                }

            }

            if (0 === strpos($pathinfo, '/api/users')) {
                // api_user_by_username
                if ($pathinfo === '/api/users/find') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_user_by_username;
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\UserController::findByUsernameAction',  '_format' => 'json',  '_route' => 'api_user_by_username',);
                }
                not_api_user_by_username:

                // api_users
                if (rtrim($pathinfo, '/') === '/api/users') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_users;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_users');
                    }

                    return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\UserController::usersAction',  '_format' => 'json',  '_route' => 'api_users',);
                }
                not_api_users:

            }

            if (0 === strpos($pathinfo, '/api-')) {
                if (0 === strpos($pathinfo, '/api-public')) {
                    if (0 === strpos($pathinfo, '/api-public/p')) {
                        // api_public_payment_request_info
                        if (0 === strpos($pathinfo, '/api-public/payment-request') && preg_match('#^/api\\-public/payment\\-request/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_api_public_payment_request_info;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_public_payment_request_info')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\PublicApi\\PaymentRequestController::getPaymentRequestById',  '_format' => 'json',));
                        }
                        not_api_public_payment_request_info:

                        if (0 === strpos($pathinfo, '/api-public/petition')) {
                            // api_public_petition_info
                            if (preg_match('#^/api\\-public/petition/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_api_public_petition_info;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_public_petition_info')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\PublicApi\\PetitionController::getPetitionById',  '_format' => 'json',));
                            }
                            not_api_public_petition_info:

                            // api_public_petition_comments
                            if (preg_match('#^/api\\-public/petition/(?P<id>\\d+)/comments$#s', $pathinfo, $matches)) {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_api_public_petition_comments;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_public_petition_comments')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\PublicApi\\PetitionController::getPetitionComments',  '_format' => 'json',));
                            }
                            not_api_public_petition_comments:

                        }

                        // civix_api_publicapi_post_getposts
                        if (rtrim($pathinfo, '/') === '/api-public/posts') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_api_publicapi_post_getposts;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'civix_api_publicapi_post_getposts');
                            }

                            return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\PublicApi\\PostController::getPosts',  '_format' => 'json',  '_route' => 'civix_api_publicapi_post_getposts',);
                        }
                        not_civix_api_publicapi_post_getposts:

                    }

                    // civix_api_publicapi_user_getusers
                    if (rtrim($pathinfo, '/') === '/api-public/users') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_api_publicapi_user_getusers;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'civix_api_publicapi_user_getusers');
                        }

                        return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\PublicApi\\UserController::getUsers',  '_format' => 'json',  '_route' => 'civix_api_publicapi_user_getusers',);
                    }
                    not_civix_api_publicapi_user_getusers:

                }

                if (0 === strpos($pathinfo, '/api-leader')) {
                    if (0 === strpos($pathinfo, '/api-leader/bank-accounts')) {
                        // civix_api_leader_bankaccounts_add
                        if ($pathinfo === '/api-leader/bank-accounts/') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_civix_api_leader_bankaccounts_add;
                            }

                            return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\Leader\\BankAccountsController::add',  '_format' => 'json',  '_route' => 'civix_api_leader_bankaccounts_add',);
                        }
                        not_civix_api_leader_bankaccounts_add:

                        // civix_api_leader_bankaccounts_listbankaccounts
                        if (rtrim($pathinfo, '/') === '/api-leader/bank-accounts') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_api_leader_bankaccounts_listbankaccounts;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'civix_api_leader_bankaccounts_listbankaccounts');
                            }

                            return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\Leader\\BankAccountsController::listBankAccounts',  '_format' => 'json',  '_route' => 'civix_api_leader_bankaccounts_listbankaccounts',);
                        }
                        not_civix_api_leader_bankaccounts_listbankaccounts:

                    }

                    if (0 === strpos($pathinfo, '/api-leader/cards')) {
                        // civix_api_leader_cards_add
                        if ($pathinfo === '/api-leader/cards/') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_civix_api_leader_cards_add;
                            }

                            return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\Leader\\CardsController::add',  '_format' => 'json',  '_route' => 'civix_api_leader_cards_add',);
                        }
                        not_civix_api_leader_cards_add:

                        // civix_api_leader_cards_listcards
                        if (rtrim($pathinfo, '/') === '/api-leader/cards') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_api_leader_cards_listcards;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'civix_api_leader_cards_listcards');
                            }

                            return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\Leader\\CardsController::listCards',  '_format' => 'json',  '_route' => 'civix_api_leader_cards_listcards',);
                        }
                        not_civix_api_leader_cards_listcards:

                        // civix_api_leader_cards_removecard
                        if (preg_match('#^/api\\-leader/cards/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'DELETE') {
                                $allow[] = 'DELETE';
                                goto not_civix_api_leader_cards_removecard;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_api_leader_cards_removecard')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\Leader\\CardsController::removeCard',  '_format' => 'json',));
                        }
                        not_civix_api_leader_cards_removecard:

                    }

                    if (0 === strpos($pathinfo, '/api-leader/micro-petitions')) {
                        // civix_api_leader_micropetition_list
                        if (rtrim($pathinfo, '/') === '/api-leader/micro-petitions') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_api_leader_micropetition_list;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'civix_api_leader_micropetition_list');
                            }

                            return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\Leader\\MicroPetitionController::listAction',  '_format' => 'json',  '_route' => 'civix_api_leader_micropetition_list',);
                        }
                        not_civix_api_leader_micropetition_list:

                        // civix_api_leader_micropetition_answerslist
                        if (preg_match('#^/api\\-leader/micro\\-petitions/(?P<id>[^/]++)/answers/?$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_api_leader_micropetition_answerslist;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'civix_api_leader_micropetition_answerslist');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_api_leader_micropetition_answerslist')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\Leader\\MicroPetitionController::answersListAction',  '_format' => 'json',));
                        }
                        not_civix_api_leader_micropetition_answerslist:

                    }

                    if (0 === strpos($pathinfo, '/api-leader/polls')) {
                        // civix_api_leader_poll_list
                        if (rtrim($pathinfo, '/') === '/api-leader/polls') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_api_leader_poll_list;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'civix_api_leader_poll_list');
                            }

                            return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\Leader\\PollController::listAction',  '_format' => 'json',  '_route' => 'civix_api_leader_poll_list',);
                        }
                        not_civix_api_leader_poll_list:

                        // civix_api_leader_poll_answerslist
                        if (preg_match('#^/api\\-leader/polls/(?P<id>[^/]++)/answers/?$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_api_leader_poll_answerslist;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'civix_api_leader_poll_answerslist');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_api_leader_poll_answerslist')), array (  '_controller' => 'Civix\\ApiBundle\\Controller\\Leader\\PollController::answersListAction',  '_format' => 'json',));
                        }
                        not_civix_api_leader_poll_answerslist:

                    }

                    // civix_api_leader_secure_createsession
                    if ($pathinfo === '/api-leader/sessions/') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_civix_api_leader_secure_createsession;
                        }

                        return array (  '_controller' => 'Civix\\ApiBundle\\Controller\\Leader\\SecureController::createSessionAction',  '_format' => 'json',  '_route' => 'civix_api_leader_secure_createsession',);
                    }
                    not_civix_api_leader_secure_createsession:

                }

            }

        }

        // civix_front_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'civix_front_homepage');
            }

            return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\DefaultController::indexAction',  '_route' => 'civix_front_homepage',);
        }

        // civix_front_help
        if ($pathinfo === '/help') {
            return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\DefaultController::indexAction',  '_route' => 'civix_front_help',);
        }

        if (0 === strpos($pathinfo, '/representative')) {
            if (0 === strpos($pathinfo, '/representative/log')) {
                // civix_front_representative_login_check
                if ($pathinfo === '/representative/login_check') {
                    return array('_route' => 'civix_front_representative_login_check');
                }

                // civix_representative_logout
                if ($pathinfo === '/representative/logout') {
                    return array('_route' => 'civix_representative_logout');
                }

            }

            // civix_front_representative
            if (rtrim($pathinfo, '/') === '/representative') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_civix_front_representative;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'civix_front_representative');
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\RepresentativeController::indexAction',  '_route' => 'civix_front_representative',);
            }
            not_civix_front_representative:

            // civix_front_representative_index
            if (rtrim($pathinfo, '/') === '/representative') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_civix_front_representative_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'civix_front_representative_index');
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\RepresentativeController::indexAction',  '_route' => 'civix_front_representative_index',);
            }
            not_civix_front_representative_index:

            // civix_front_representative_registration
            if ($pathinfo === '/representative/registration') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_civix_front_representative_registration;
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\RepresentativeController::registrationAction',  '_route' => 'civix_front_representative_registration',);
            }
            not_civix_front_representative_registration:

            // civix_front_representative_login
            if ($pathinfo === '/representative/login') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_civix_front_representative_login;
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\RepresentativeController::loginAction',  '_route' => 'civix_front_representative_login',);
            }
            not_civix_front_representative_login:

            // civix_front_representative_edit_profile
            if ($pathinfo === '/representative/edit-profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_civix_front_representative_edit_profile;
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\RepresentativeController::editProfileAction',  '_route' => 'civix_front_representative_edit_profile',);
            }
            not_civix_front_representative_edit_profile:

            // civix_front_representative_update_profile
            if ($pathinfo === '/representative/update-profile') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_civix_front_representative_update_profile;
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\RepresentativeController::updateProfileAction',  '_route' => 'civix_front_representative_update_profile',);
            }
            not_civix_front_representative_update_profile:

            // civix_front_representative_crop_avatar
            if ($pathinfo === '/representative/crop-avatar') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_civix_front_representative_crop_avatar;
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\RepresentativeController::cropAvatarAction',  '_route' => 'civix_front_representative_crop_avatar',);
            }
            not_civix_front_representative_crop_avatar:

            // civix_front_representative_update_avatar
            if ($pathinfo === '/representative/update-avatar') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_civix_front_representative_update_avatar;
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\RepresentativeController::updateAvatarAction',  '_route' => 'civix_front_representative_update_avatar',);
            }
            not_civix_front_representative_update_avatar:

            if (0 === strpos($pathinfo, '/representative/incoming-answers')) {
                // civix_front_representative_incoming_answers
                if ($pathinfo === '/representative/incoming-answers') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_representative_incoming_answers;
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\RepresentativeController::incomingAnswersAction',  '_route' => 'civix_front_representative_incoming_answers',);
                }
                not_civix_front_representative_incoming_answers:

                // civix_front_representative_incoming_answers_details
                if (preg_match('#^/representative/incoming\\-answers/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_representative_incoming_answers_details;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_incoming_answers_details')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\RepresentativeController::incomingAnswersDetailsAction',));
                }
                not_civix_front_representative_incoming_answers_details:

            }

            // civix_front_representative_municipal
            if ($pathinfo === '/representative/municipal') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_civix_front_representative_municipal;
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\RepresentativeController::municipalAction',  '_route' => 'civix_front_representative_municipal',);
            }
            not_civix_front_representative_municipal:

            if (0 === strpos($pathinfo, '/representative/announcements')) {
                // civix_front_representative_announcement_index
                if ($pathinfo === '/representative/announcements') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_representative_announcement_index;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_announcement_index', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\AnnouncementController::indexAction',  '_route' => 'civix_front_representative_announcement_index',);
                }
                not_civix_front_representative_announcement_index:

                // civix_front_representative_announcement_new
                if ($pathinfo === '/representative/announcements/new') {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_announcement_new', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\AnnouncementController::newAction',  '_route' => 'civix_front_representative_announcement_new',);
                }

                // civix_front_representative_announcement_edit
                if (0 === strpos($pathinfo, '/representative/announcements/edit') && preg_match('#^/representative/announcements/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_announcement_edit', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_announcement_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\AnnouncementController::editAction',));
                }

                // civix_front_representative_announcement_delete
                if (0 === strpos($pathinfo, '/representative/announcements/delete') && preg_match('#^/representative/announcements/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_announcement_delete', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_announcement_delete')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\AnnouncementController::deleteAction',));
                }

                // civix_front_representative_announcement_publish
                if (0 === strpos($pathinfo, '/representative/announcements/publish') && preg_match('#^/representative/announcements/publish/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_announcement_publish', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_announcement_publish')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\AnnouncementController::publishAction',));
                }

            }

            if (0 === strpos($pathinfo, '/representative/leader-event')) {
                // civix_front_representative_leaderevent_index
                if ($pathinfo === '/representative/leader-event') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_representative_leaderevent_index;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_leaderevent_index', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\LeaderEventController::indexAction',  '_route' => 'civix_front_representative_leaderevent_index',);
                }
                not_civix_front_representative_leaderevent_index:

                // civix_front_representative_leaderevent_new
                if ($pathinfo === '/representative/leader-event/new') {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_leaderevent_new', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\LeaderEventController::newAction',  '_route' => 'civix_front_representative_leaderevent_new',);
                }

                // civix_front_representative_leaderevent_edit
                if (0 === strpos($pathinfo, '/representative/leader-event/edit') && preg_match('#^/representative/leader\\-event/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_leaderevent_edit', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_leaderevent_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\LeaderEventController::editAction',));
                }

                // civix_front_representative_leaderevent_delete
                if (0 === strpos($pathinfo, '/representative/leader-event/delete') && preg_match('#^/representative/leader\\-event/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_leaderevent_delete', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_leaderevent_delete')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\LeaderEventController::deleteAction',));
                }

                // civix_front_representative_leaderevent_publish
                if (0 === strpos($pathinfo, '/representative/leader-event/publish') && preg_match('#^/representative/leader\\-event/publish/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_leaderevent_publish', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_leaderevent_publish')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\LeaderEventController::publishAction',));
                }

            }

            if (0 === strpos($pathinfo, '/representative/news')) {
                // civix_front_representative_news_index
                if (rtrim($pathinfo, '/') === '/representative/news') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_representative_news_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'civix_front_representative_news_index');
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_news_index', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\NewsController::indexAction',  '_route' => 'civix_front_representative_news_index',);
                }
                not_civix_front_representative_news_index:

                // civix_front_representative_news_details
                if (0 === strpos($pathinfo, '/representative/news/details') && preg_match('#^/representative/news/details/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_representative_news_details;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_news_details', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_news_details')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\NewsController::detailsAction',));
                }
                not_civix_front_representative_news_details:

                // civix_front_representative_news_new
                if ($pathinfo === '/representative/news/new') {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_news_new', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\NewsController::newAction',  '_route' => 'civix_front_representative_news_new',);
                }

                // civix_front_representative_news_edit
                if (0 === strpos($pathinfo, '/representative/news/edit') && preg_match('#^/representative/news/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_news_edit', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_news_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\NewsController::editAction',));
                }

                // civix_front_representative_news_delete
                if (0 === strpos($pathinfo, '/representative/news/delete') && preg_match('#^/representative/news/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_news_delete', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_news_delete')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\NewsController::deleteAction',));
                }

                // civix_front_representative_news_publish
                if (0 === strpos($pathinfo, '/representative/news/publish') && preg_match('#^/representative/news/publish/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_news_publish', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_news_publish')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\NewsController::publishAction',));
                }

            }

            if (0 === strpos($pathinfo, '/representative/p')) {
                if (0 === strpos($pathinfo, '/representative/petitions')) {
                    if (0 === strpos($pathinfo, '/representative/petitions/buy-')) {
                        // civix_front_representative_payment_buyemails
                        if (0 === strpos($pathinfo, '/representative/petitions/buy-emails') && preg_match('#^/representative/petitions/buy\\-emails/(?P<petition>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_representative_payment_buyemails', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_payment_buyemails')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PaymentController::buyEmailsAction',));
                        }

                        // civix_front_representative_payment_buypublicpetition
                        if (0 === strpos($pathinfo, '/representative/petitions/buy-outsiders') && preg_match('#^/representative/petitions/buy\\-outsiders/(?P<petition>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_representative_payment_buypublicpetition', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_payment_buypublicpetition')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PaymentController::buyPublicPetitionAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/representative/petitions/transaction')) {
                        // civix_front_representative_payment_success
                        if (0 === strpos($pathinfo, '/representative/petitions/transaction/success/emails') && preg_match('#^/representative/petitions/transaction/success/emails/(?P<reference>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_representative_payment_success', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_payment_success')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PaymentController::successAction',));
                        }

                        // civix_front_representative_payment_emails
                        if (0 === strpos($pathinfo, '/representative/petitions/transaction/emails') && preg_match('#^/representative/petitions/transaction/emails/(?P<reference>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_representative_payment_emails', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_payment_emails')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PaymentController::emailsAction',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/representative/payment-')) {
                    if (0 === strpos($pathinfo, '/representative/payment-request')) {
                        // civix_front_representative_paymentrequest_index
                        if ($pathinfo === '/representative/payment-request') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_front_representative_paymentrequest_index;
                            }

                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_representative_paymentrequest_index', 'https');
                            }

                            return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PaymentRequestController::indexAction',  '_route' => 'civix_front_representative_paymentrequest_index',);
                        }
                        not_civix_front_representative_paymentrequest_index:

                        // civix_front_representative_paymentrequest_followup
                        if (0 === strpos($pathinfo, '/representative/payment-request/follow-up') && preg_match('#^/representative/payment\\-request/follow\\-up/(?P<petition>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_front_representative_paymentrequest_followup;
                            }

                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_representative_paymentrequest_followup', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_paymentrequest_followup')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PaymentRequestController::followUpAction',));
                        }
                        not_civix_front_representative_paymentrequest_followup:

                        // civix_front_representative_paymentrequest_new
                        if ($pathinfo === '/representative/payment-request/new') {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_representative_paymentrequest_new', 'https');
                            }

                            return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PaymentRequestController::newAction',  '_route' => 'civix_front_representative_paymentrequest_new',);
                        }

                        // civix_front_representative_paymentrequest_edit
                        if (0 === strpos($pathinfo, '/representative/payment-request/edit') && preg_match('#^/representative/payment\\-request/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_representative_paymentrequest_edit', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_paymentrequest_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PaymentRequestController::editAction',));
                        }

                        if (0 === strpos($pathinfo, '/representative/payment-request/publish')) {
                            // civix_front_representative_paymentrequest_publish
                            if (preg_match('#^/representative/payment\\-request/publish/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                                if ($this->context->getScheme() !== 'https') {
                                    return $this->redirect($pathinfo, 'civix_front_representative_paymentrequest_publish', 'https');
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_paymentrequest_publish')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PaymentRequestController::publishAction',));
                            }

                            // civix_front_representative_paymentrequest_publishfollowup
                            if (preg_match('#^/representative/payment\\-request/publish/(?P<id>\\d+)/follow\\-up/(?P<petition>[^/]++)$#s', $pathinfo, $matches)) {
                                if ($this->context->getScheme() !== 'https') {
                                    return $this->redirect($pathinfo, 'civix_front_representative_paymentrequest_publishfollowup', 'https');
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_paymentrequest_publishfollowup')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PaymentRequestController::publishFollowUpAction',));
                            }

                        }

                        // civix_front_representative_paymentrequest_delete
                        if (0 === strpos($pathinfo, '/representative/payment-request/delete') && preg_match('#^/representative/payment\\-request/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_representative_paymentrequest_delete', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_paymentrequest_delete')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PaymentRequestController::deleteAction',));
                        }

                        // civix_front_representative_paymentrequest_funds
                        if (0 === strpos($pathinfo, '/representative/payment-request/funds') && preg_match('#^/representative/payment\\-request/funds/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                                goto not_civix_front_representative_paymentrequest_funds;
                            }

                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_representative_paymentrequest_funds', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_paymentrequest_funds')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PaymentRequestController::fundsAction',));
                        }
                        not_civix_front_representative_paymentrequest_funds:

                    }

                    if (0 === strpos($pathinfo, '/representative/payment-settings')) {
                        // civix_front_representative_paymentsettings_index
                        if (rtrim($pathinfo, '/') === '/representative/payment-settings') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_front_representative_paymentsettings_index;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'civix_front_representative_paymentsettings_index');
                            }

                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_representative_paymentsettings_index', 'https');
                            }

                            return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PaymentSettingsController::indexAction',  '_route' => 'civix_front_representative_paymentsettings_index',);
                        }
                        not_civix_front_representative_paymentsettings_index:

                        // civix_front_representative_paymentsettings_accounttype
                        if (0 === strpos($pathinfo, '/representative/payment-settings/account') && preg_match('#^/representative/payment\\-settings/account/(?P<type>personal|business)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_representative_paymentsettings_accounttype', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_paymentsettings_accounttype')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PaymentSettingsController::accountTypeAction',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/representative/petitions')) {
                    // civix_front_representative_petition_index
                    if ($pathinfo === '/representative/petitions') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_representative_petition_index;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_representative_petition_index', 'https');
                        }

                        return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PetitionController::indexAction',  '_route' => 'civix_front_representative_petition_index',);
                    }
                    not_civix_front_representative_petition_index:

                    // civix_front_representative_petition_new
                    if ($pathinfo === '/representative/petitions/new') {
                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_representative_petition_new', 'https');
                        }

                        return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PetitionController::newAction',  '_route' => 'civix_front_representative_petition_new',);
                    }

                    // civix_front_representative_petition_edit
                    if (0 === strpos($pathinfo, '/representative/petitions/edit') && preg_match('#^/representative/petitions/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_representative_petition_edit', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_petition_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PetitionController::editAction',));
                    }

                    // civix_front_representative_petition_publish
                    if (0 === strpos($pathinfo, '/representative/petitions/publish') && preg_match('#^/representative/petitions/publish/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_representative_petition_publish', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_petition_publish')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PetitionController::publishAction',));
                    }

                    // civix_front_representative_petition_delete
                    if (0 === strpos($pathinfo, '/representative/petitions/delete') && preg_match('#^/representative/petitions/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_representative_petition_delete', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_petition_delete')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\PetitionController::deleteAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/representative/question')) {
                // civix_front_representative_question_index
                if ($pathinfo === '/representative/question') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_representative_question_index;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_question_index', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\QuestionController::indexAction',  '_route' => 'civix_front_representative_question_index',);
                }
                not_civix_front_representative_question_index:

                // civix_front_representative_question_response
                if ($pathinfo === '/representative/question/sending-out-response') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_representative_question_response;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_question_response', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\QuestionController::responseAction',  '_route' => 'civix_front_representative_question_response',);
                }
                not_civix_front_representative_question_response:

                // civix_front_representative_question_archive
                if ($pathinfo === '/representative/question/archive') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_representative_question_archive;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_question_archive', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\QuestionController::archiveAction',  '_route' => 'civix_front_representative_question_archive',);
                }
                not_civix_front_representative_question_archive:

                // civix_front_representative_question_new
                if ($pathinfo === '/representative/question/new') {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_question_new', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\QuestionController::newAction',  '_route' => 'civix_front_representative_question_new',);
                }

                // civix_front_representative_question_edit
                if (0 === strpos($pathinfo, '/representative/question/edit') && preg_match('#^/representative/question/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_question_edit', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_question_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\QuestionController::editAction',));
                }

                // civix_front_representative_question_publish
                if (0 === strpos($pathinfo, '/representative/question/publish') && preg_match('#^/representative/question/publish/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_question_publish', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_question_publish')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\QuestionController::publishAction',));
                }

                if (0 === strpos($pathinfo, '/representative/question/de')) {
                    // civix_front_representative_question_delete
                    if (0 === strpos($pathinfo, '/representative/question/delete') && preg_match('#^/representative/question/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_representative_question_delete', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_question_delete')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\QuestionController::deleteAction',));
                    }

                    // civix_front_representative_question_details
                    if (0 === strpos($pathinfo, '/representative/question/details') && preg_match('#^/representative/question/details/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_representative_question_details', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_question_details')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\QuestionController::detailsAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/representative/reports')) {
                // civix_front_representative_report_index
                if ($pathinfo === '/representative/reports') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_representative_report_index;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_report_index', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\ReportController::indexAction',  '_route' => 'civix_front_representative_report_index',);
                }
                not_civix_front_representative_report_index:

                // civix_front_representative_report_question
                if (preg_match('#^/representative/reports/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_representative_report_question;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_report_question', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_report_question')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\ReportController::questionAction',));
                }
                not_civix_front_representative_report_question:

                if (0 === strpos($pathinfo, '/representative/reports/events')) {
                    // civix_front_representative_report_events
                    if ($pathinfo === '/representative/reports/events') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_representative_report_events;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_representative_report_events', 'https');
                        }

                        return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\ReportController::eventsAction',  '_route' => 'civix_front_representative_report_events',);
                    }
                    not_civix_front_representative_report_events:

                    // civix_front_representative_report_event
                    if (preg_match('#^/representative/reports/events/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_representative_report_event;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_representative_report_event', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_report_event')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\ReportController::eventAction',));
                    }
                    not_civix_front_representative_report_event:

                }

                if (0 === strpos($pathinfo, '/representative/reports/payment-requests')) {
                    // civix_front_representative_report_payments
                    if ($pathinfo === '/representative/reports/payment-requests') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_representative_report_payments;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_representative_report_payments', 'https');
                        }

                        return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\ReportController::paymentsAction',  '_route' => 'civix_front_representative_report_payments',);
                    }
                    not_civix_front_representative_report_payments:

                    // civix_front_representative_report_payment
                    if (preg_match('#^/representative/reports/payment\\-requests/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_representative_report_payment;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_representative_report_payment', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_report_payment')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\ReportController::paymentAction',));
                    }
                    not_civix_front_representative_report_payment:

                }

            }

            // civix_front_representative_session_createleadersession
            if ($pathinfo === '/representative/create-session') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_civix_front_representative_session_createleadersession;
                }

                if ($this->context->getScheme() !== 'https') {
                    return $this->redirect($pathinfo, 'civix_front_representative_session_createleadersession', 'https');
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\SessionController::createLeaderSession',  '_route' => 'civix_front_representative_session_createleadersession',);
            }
            not_civix_front_representative_session_createleadersession:

            if (0 === strpos($pathinfo, '/representative/subscriptions')) {
                // civix_front_representative_subscription_index
                if ($pathinfo === '/representative/subscriptions') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_representative_subscription_index;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_subscription_index', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\SubscriptionController::indexAction',  '_route' => 'civix_front_representative_subscription_index',);
                }
                not_civix_front_representative_subscription_index:

                // civix_front_representative_subscription_subscribe
                if (preg_match('#^/representative/subscriptions/(?P<id>20|30|40)/subscribe$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_subscription_subscribe', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_representative_subscription_subscribe')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\SubscriptionController::subscribeAction',));
                }

                // civix_front_representative_subscription_cancelsubscription
                if ($pathinfo === '/representative/subscriptions/cancel') {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_representative_subscription_cancelsubscription', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Representative\\SubscriptionController::cancelSubscriptionAction',  '_route' => 'civix_front_representative_subscription_cancelsubscription',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/group')) {
            if (0 === strpos($pathinfo, '/group/log')) {
                // civix_front_group_login_check
                if ($pathinfo === '/group/login_check') {
                    return array('_route' => 'civix_front_group_login_check');
                }

                // civix_group_logout
                if ($pathinfo === '/group/logout') {
                    return array('_route' => 'civix_group_logout');
                }

            }

            // civix_front_group_index
            if (rtrim($pathinfo, '/') === '/group') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_civix_front_group_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'civix_front_group_index');
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\GroupController::indexAction',  '_route' => 'civix_front_group_index',);
            }
            not_civix_front_group_index:

            // civix_front_group_registration
            if ($pathinfo === '/group/registration') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_civix_front_group_registration;
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\GroupController::registrationAction',  '_route' => 'civix_front_group_registration',);
            }
            not_civix_front_group_registration:

            // civix_front_group_login
            if ($pathinfo === '/group/login') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_civix_front_group_login;
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\GroupController::loginAction',  '_route' => 'civix_front_group_login',);
            }
            not_civix_front_group_login:

            // civix_front_group_edit_profile
            if ($pathinfo === '/group/edit-profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_civix_front_group_edit_profile;
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\GroupController::editProfileAction',  '_route' => 'civix_front_group_edit_profile',);
            }
            not_civix_front_group_edit_profile:

            // civix_front_group_update_profile
            if ($pathinfo === '/group/update-profile') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_civix_front_group_update_profile;
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\GroupController::updateProfileAction',  '_route' => 'civix_front_group_update_profile',);
            }
            not_civix_front_group_update_profile:

            // civix_front_group_crop_avatar
            if ($pathinfo === '/group/crop-avatar') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_civix_front_group_crop_avatar;
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\GroupController::cropAvatarAction',  '_route' => 'civix_front_group_crop_avatar',);
            }
            not_civix_front_group_crop_avatar:

            // civix_front_group_update_avatar
            if ($pathinfo === '/group/update-avatar') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_civix_front_group_update_avatar;
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\GroupController::updateAvatarAction',  '_route' => 'civix_front_group_update_avatar',);
            }
            not_civix_front_group_update_avatar:

            if (0 === strpos($pathinfo, '/group/invite')) {
                // civix_front_group_invite
                if ($pathinfo === '/group/invite') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_group_invite;
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\GroupController::inviteAction',  '_route' => 'civix_front_group_invite',);
                }
                not_civix_front_group_invite:

                // civix_front_group_send_invite
                if ($pathinfo === '/group/invite/send') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_civix_front_group_send_invite;
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\GroupController::sendInviteAction',  '_route' => 'civix_front_group_send_invite',);
                }
                not_civix_front_group_send_invite:

            }

            if (0 === strpos($pathinfo, '/group/announcements')) {
                // civix_front_group_announcement_index
                if ($pathinfo === '/group/announcements') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_group_announcement_index;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_announcement_index', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\AnnouncementController::indexAction',  '_route' => 'civix_front_group_announcement_index',);
                }
                not_civix_front_group_announcement_index:

                // civix_front_group_announcement_new
                if ($pathinfo === '/group/announcements/new') {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_announcement_new', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\AnnouncementController::newAction',  '_route' => 'civix_front_group_announcement_new',);
                }

                // civix_front_group_announcement_edit
                if (0 === strpos($pathinfo, '/group/announcements/edit') && preg_match('#^/group/announcements/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_announcement_edit', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_announcement_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\AnnouncementController::editAction',));
                }

                // civix_front_group_announcement_delete
                if (0 === strpos($pathinfo, '/group/announcements/delete') && preg_match('#^/group/announcements/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_announcement_delete', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_announcement_delete')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\AnnouncementController::deleteAction',));
                }

                // civix_front_group_announcement_publish
                if (0 === strpos($pathinfo, '/group/announcements/publish') && preg_match('#^/group/announcements/publish/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_announcement_publish', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_announcement_publish')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\AnnouncementController::publishAction',));
                }

            }

            if (0 === strpos($pathinfo, '/group/fields')) {
                // civix_front_group_fields
                if ($pathinfo === '/group/fields') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_group_fields;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_fields', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\FieldsController::fieldsForm',  '_route' => 'civix_front_group_fields',);
                }
                not_civix_front_group_fields:

                // civix_front_group_fields_update
                if ($pathinfo === '/group/fields') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_civix_front_group_fields_update;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_fields_update', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\FieldsController::updateFields',  '_route' => 'civix_front_group_fields_update',);
                }
                not_civix_front_group_fields_update:

            }

            if (0 === strpos($pathinfo, '/group/leader-event')) {
                // civix_front_group_leaderevent_index
                if ($pathinfo === '/group/leader-event') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_group_leaderevent_index;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_leaderevent_index', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\LeaderEventController::indexAction',  '_route' => 'civix_front_group_leaderevent_index',);
                }
                not_civix_front_group_leaderevent_index:

                // civix_front_group_leaderevent_new
                if ($pathinfo === '/group/leader-event/new') {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_leaderevent_new', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\LeaderEventController::newAction',  '_route' => 'civix_front_group_leaderevent_new',);
                }

                // civix_front_group_leaderevent_edit
                if (0 === strpos($pathinfo, '/group/leader-event/edit') && preg_match('#^/group/leader\\-event/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_leaderevent_edit', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_leaderevent_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\LeaderEventController::editAction',));
                }

                // civix_front_group_leaderevent_delete
                if (0 === strpos($pathinfo, '/group/leader-event/delete') && preg_match('#^/group/leader\\-event/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_leaderevent_delete', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_leaderevent_delete')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\LeaderEventController::deleteAction',));
                }

                // civix_front_group_leaderevent_publish
                if (0 === strpos($pathinfo, '/group/leader-event/publish') && preg_match('#^/group/leader\\-event/publish/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_leaderevent_publish', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_leaderevent_publish')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\LeaderEventController::publishAction',));
                }

            }

            if (0 === strpos($pathinfo, '/group/m')) {
                if (0 === strpos($pathinfo, '/group/members')) {
                    // civix_front_group_members
                    if ($pathinfo === '/group/members') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_group_members;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_group_members', 'https');
                        }

                        return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\MemberController::membersAction',  '_route' => 'civix_front_group_members',);
                    }
                    not_civix_front_group_members:

                    // civix_front_group_members_remove
                    if (preg_match('#^/group/members/(?P<id>[^/]++)/remove$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_civix_front_group_members_remove;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_group_members_remove', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_members_remove')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\MemberController::memberRemoveAction',));
                    }
                    not_civix_front_group_members_remove:

                    // civix_front_group_manage_approvals
                    if ($pathinfo === '/group/members/approvals') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_group_manage_approvals;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_group_manage_approvals', 'https');
                        }

                        return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\MemberController::manageApprovalsAction',  '_route' => 'civix_front_group_manage_approvals',);
                    }
                    not_civix_front_group_manage_approvals:

                    // civix_front_group_members_approve
                    if (preg_match('#^/group/members/(?P<id>\\d+)/approve$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_civix_front_group_members_approve;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_group_members_approve', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_members_approve')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\MemberController::approveUser',));
                    }
                    not_civix_front_group_members_approve:

                    // civix_front_group_members_fields
                    if (preg_match('#^/group/members/(?P<id>\\d+)/fields$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_group_members_fields;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_group_members_fields', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_members_fields')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\MemberController::getUserFields',));
                    }
                    not_civix_front_group_members_fields:

                    if (0 === strpos($pathinfo, '/group/membership')) {
                        // civix_front_group_membership
                        if (rtrim($pathinfo, '/') === '/group/membership') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_front_group_membership;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'civix_front_group_membership');
                            }

                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_membership', 'https');
                            }

                            return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\MembershipController::membershipAction',  '_route' => 'civix_front_group_membership',);
                        }
                        not_civix_front_group_membership:

                        // civix_front_group_membership_save
                        if ($pathinfo === '/group/membership/') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_civix_front_group_membership_save;
                            }

                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_membership_save', 'https');
                            }

                            return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\MembershipController::membershipSaveAction',  '_route' => 'civix_front_group_membership_save',);
                        }
                        not_civix_front_group_membership_save:

                    }

                }

                if (0 === strpos($pathinfo, '/group/micro-petitions')) {
                    // civix_front_petitions
                    if ($pathinfo === '/group/micro-petitions') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_petitions;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_petitions', 'https');
                        }

                        return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\MicropetitionController::petitionAction',  '_route' => 'civix_front_petitions',);
                    }
                    not_civix_front_petitions:

                    // civix_front_petitions_open
                    if ($pathinfo === '/group/micro-petitions/open') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_petitions_open;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_petitions_open', 'https');
                        }

                        return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\MicropetitionController::openPetitionAction',  '_route' => 'civix_front_petitions_open',);
                    }
                    not_civix_front_petitions_open:

                    // civix_front_petitions_boost
                    if (0 === strpos($pathinfo, '/group/micro-petitions/boost') && preg_match('#^/group/micro\\-petitions/boost/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_petitions_boost;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_petitions_boost', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_petitions_boost')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\MicropetitionController::petitionBoostAction',));
                    }
                    not_civix_front_petitions_boost:

                    // civix_front_petitions_details
                    if (0 === strpos($pathinfo, '/group/micro-petitions/details') && preg_match('#^/group/micro\\-petitions/details/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_petitions_details;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_petitions_details', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_petitions_details')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\MicropetitionController::petitionDetailsAction',));
                    }
                    not_civix_front_petitions_details:

                    if (0 === strpos($pathinfo, '/group/micro-petitions/config')) {
                        // civix_front_petitions_config
                        if ($pathinfo === '/group/micro-petitions/config') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_front_petitions_config;
                            }

                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_petitions_config', 'https');
                            }

                            return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\MicropetitionController::petitionConfigAction',  '_route' => 'civix_front_petitions_config',);
                        }
                        not_civix_front_petitions_config:

                        // civix_front_petitions_config_save
                        if ($pathinfo === '/group/micro-petitions/config') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_civix_front_petitions_config_save;
                            }

                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_petitions_config_save', 'https');
                            }

                            return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\MicropetitionController::petitionConfigSaveAction',  '_route' => 'civix_front_petitions_config_save',);
                        }
                        not_civix_front_petitions_config_save:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/group/news')) {
                // civix_front_group_news_index
                if (rtrim($pathinfo, '/') === '/group/news') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_group_news_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'civix_front_group_news_index');
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_news_index', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\NewsController::indexAction',  '_route' => 'civix_front_group_news_index',);
                }
                not_civix_front_group_news_index:

                // civix_front_group_news_details
                if (0 === strpos($pathinfo, '/group/news/details') && preg_match('#^/group/news/details/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_group_news_details;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_news_details', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_news_details')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\NewsController::detailsAction',));
                }
                not_civix_front_group_news_details:

                // civix_front_group_news_new
                if ($pathinfo === '/group/news/new') {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_news_new', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\NewsController::newAction',  '_route' => 'civix_front_group_news_new',);
                }

                // civix_front_group_news_edit
                if (0 === strpos($pathinfo, '/group/news/edit') && preg_match('#^/group/news/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_news_edit', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_news_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\NewsController::editAction',));
                }

                // civix_front_group_news_delete
                if (0 === strpos($pathinfo, '/group/news/delete') && preg_match('#^/group/news/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_news_delete', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_news_delete')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\NewsController::deleteAction',));
                }

                // civix_front_group_news_publish
                if (0 === strpos($pathinfo, '/group/news/publish') && preg_match('#^/group/news/publish/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_news_publish', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_news_publish')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\NewsController::publishAction',));
                }

            }

            if (0 === strpos($pathinfo, '/group/p')) {
                if (0 === strpos($pathinfo, '/group/petitions')) {
                    if (0 === strpos($pathinfo, '/group/petitions/buy-')) {
                        // civix_front_group_payment_buyemails
                        if (0 === strpos($pathinfo, '/group/petitions/buy-emails') && preg_match('#^/group/petitions/buy\\-emails/(?P<petition>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_payment_buyemails', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_payment_buyemails')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PaymentController::buyEmailsAction',));
                        }

                        // civix_front_group_payment_buypublicpetition
                        if (0 === strpos($pathinfo, '/group/petitions/buy-outsiders') && preg_match('#^/group/petitions/buy\\-outsiders/(?P<petition>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_payment_buypublicpetition', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_payment_buypublicpetition')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PaymentController::buyPublicPetitionAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/group/petitions/transaction')) {
                        // civix_front_group_payment_success
                        if (0 === strpos($pathinfo, '/group/petitions/transaction/success/emails') && preg_match('#^/group/petitions/transaction/success/emails/(?P<reference>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_payment_success', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_payment_success')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PaymentController::successAction',));
                        }

                        // civix_front_group_payment_emails
                        if (0 === strpos($pathinfo, '/group/petitions/transaction/emails') && preg_match('#^/group/petitions/transaction/emails/(?P<reference>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_payment_emails', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_payment_emails')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PaymentController::emailsAction',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/group/payment-')) {
                    if (0 === strpos($pathinfo, '/group/payment-request')) {
                        // civix_front_group_paymentrequest_index
                        if ($pathinfo === '/group/payment-request') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_front_group_paymentrequest_index;
                            }

                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_paymentrequest_index', 'https');
                            }

                            return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PaymentRequestController::indexAction',  '_route' => 'civix_front_group_paymentrequest_index',);
                        }
                        not_civix_front_group_paymentrequest_index:

                        // civix_front_group_paymentrequest_followup
                        if (0 === strpos($pathinfo, '/group/payment-request/follow-up') && preg_match('#^/group/payment\\-request/follow\\-up/(?P<petition>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_front_group_paymentrequest_followup;
                            }

                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_paymentrequest_followup', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_paymentrequest_followup')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PaymentRequestController::followUpAction',));
                        }
                        not_civix_front_group_paymentrequest_followup:

                        // civix_front_group_paymentrequest_new
                        if ($pathinfo === '/group/payment-request/new') {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_paymentrequest_new', 'https');
                            }

                            return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PaymentRequestController::newAction',  '_route' => 'civix_front_group_paymentrequest_new',);
                        }

                        // civix_front_group_paymentrequest_edit
                        if (0 === strpos($pathinfo, '/group/payment-request/edit') && preg_match('#^/group/payment\\-request/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_paymentrequest_edit', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_paymentrequest_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PaymentRequestController::editAction',));
                        }

                        if (0 === strpos($pathinfo, '/group/payment-request/publish')) {
                            // civix_front_group_paymentrequest_publish
                            if (preg_match('#^/group/payment\\-request/publish/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                                if ($this->context->getScheme() !== 'https') {
                                    return $this->redirect($pathinfo, 'civix_front_group_paymentrequest_publish', 'https');
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_paymentrequest_publish')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PaymentRequestController::publishAction',));
                            }

                            // civix_front_group_paymentrequest_publishfollowup
                            if (preg_match('#^/group/payment\\-request/publish/(?P<id>\\d+)/follow\\-up/(?P<petition>[^/]++)$#s', $pathinfo, $matches)) {
                                if ($this->context->getScheme() !== 'https') {
                                    return $this->redirect($pathinfo, 'civix_front_group_paymentrequest_publishfollowup', 'https');
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_paymentrequest_publishfollowup')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PaymentRequestController::publishFollowUpAction',));
                            }

                        }

                        // civix_front_group_paymentrequest_delete
                        if (0 === strpos($pathinfo, '/group/payment-request/delete') && preg_match('#^/group/payment\\-request/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_paymentrequest_delete', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_paymentrequest_delete')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PaymentRequestController::deleteAction',));
                        }

                        // civix_front_group_paymentrequest_funds
                        if (0 === strpos($pathinfo, '/group/payment-request/funds') && preg_match('#^/group/payment\\-request/funds/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                                goto not_civix_front_group_paymentrequest_funds;
                            }

                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_paymentrequest_funds', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_paymentrequest_funds')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PaymentRequestController::fundsAction',));
                        }
                        not_civix_front_group_paymentrequest_funds:

                    }

                    if (0 === strpos($pathinfo, '/group/payment-settings')) {
                        // civix_front_group_paymentsettings_index
                        if (rtrim($pathinfo, '/') === '/group/payment-settings') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_front_group_paymentsettings_index;
                            }

                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'civix_front_group_paymentsettings_index');
                            }

                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_paymentsettings_index', 'https');
                            }

                            return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PaymentSettingsController::indexAction',  '_route' => 'civix_front_group_paymentsettings_index',);
                        }
                        not_civix_front_group_paymentsettings_index:

                        // civix_front_group_paymentsettings_accounttype
                        if (0 === strpos($pathinfo, '/group/payment-settings/account') && preg_match('#^/group/payment\\-settings/account/(?P<type>personal|business)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_paymentsettings_accounttype', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_paymentsettings_accounttype')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PaymentSettingsController::accountTypeAction',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/group/pe')) {
                    // civix_front_group_permissionsettings_index
                    if (rtrim($pathinfo, '/') === '/group/permission-settings') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'civix_front_group_permissionsettings_index');
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_group_permissionsettings_index', 'https');
                        }

                        return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PermissionSettingsController::indexAction',  '_route' => 'civix_front_group_permissionsettings_index',);
                    }

                    if (0 === strpos($pathinfo, '/group/petitions')) {
                        // civix_front_group_petition_invite
                        if (0 === strpos($pathinfo, '/group/petitions/invite') && preg_match('#^/group/petitions/invite/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_petition_invite', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_petition_invite')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PetitionController::inviteAction',));
                        }

                        // civix_front_group_petition_index
                        if ($pathinfo === '/group/petitions') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_front_group_petition_index;
                            }

                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_petition_index', 'https');
                            }

                            return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PetitionController::indexAction',  '_route' => 'civix_front_group_petition_index',);
                        }
                        not_civix_front_group_petition_index:

                        // civix_front_group_petition_new
                        if ($pathinfo === '/group/petitions/new') {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_petition_new', 'https');
                            }

                            return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PetitionController::newAction',  '_route' => 'civix_front_group_petition_new',);
                        }

                        // civix_front_group_petition_edit
                        if (0 === strpos($pathinfo, '/group/petitions/edit') && preg_match('#^/group/petitions/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_petition_edit', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_petition_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PetitionController::editAction',));
                        }

                        // civix_front_group_petition_publish
                        if (0 === strpos($pathinfo, '/group/petitions/publish') && preg_match('#^/group/petitions/publish/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_petition_publish', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_petition_publish')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PetitionController::publishAction',));
                        }

                        // civix_front_group_petition_delete
                        if (0 === strpos($pathinfo, '/group/petitions/delete') && preg_match('#^/group/petitions/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_group_petition_delete', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_petition_delete')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\PetitionController::deleteAction',));
                        }

                    }

                }

            }

            if (0 === strpos($pathinfo, '/group/question')) {
                // civix_front_group_question_index
                if ($pathinfo === '/group/question') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_group_question_index;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_question_index', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\QuestionController::indexAction',  '_route' => 'civix_front_group_question_index',);
                }
                not_civix_front_group_question_index:

                // civix_front_group_question_response
                if ($pathinfo === '/group/question/sending-out-response') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_group_question_response;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_question_response', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\QuestionController::responseAction',  '_route' => 'civix_front_group_question_response',);
                }
                not_civix_front_group_question_response:

                // civix_front_group_question_archive
                if ($pathinfo === '/group/question/archive') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_group_question_archive;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_question_archive', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\QuestionController::archiveAction',  '_route' => 'civix_front_group_question_archive',);
                }
                not_civix_front_group_question_archive:

                // civix_front_group_question_new
                if ($pathinfo === '/group/question/new') {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_question_new', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\QuestionController::newAction',  '_route' => 'civix_front_group_question_new',);
                }

                // civix_front_group_question_edit
                if (0 === strpos($pathinfo, '/group/question/edit') && preg_match('#^/group/question/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_question_edit', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_question_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\QuestionController::editAction',));
                }

                // civix_front_group_question_publish
                if (0 === strpos($pathinfo, '/group/question/publish') && preg_match('#^/group/question/publish/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_question_publish', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_question_publish')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\QuestionController::publishAction',));
                }

                if (0 === strpos($pathinfo, '/group/question/de')) {
                    // civix_front_group_question_delete
                    if (0 === strpos($pathinfo, '/group/question/delete') && preg_match('#^/group/question/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_group_question_delete', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_question_delete')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\QuestionController::deleteAction',));
                    }

                    // civix_front_group_question_details
                    if (0 === strpos($pathinfo, '/group/question/details') && preg_match('#^/group/question/details/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_group_question_details', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_question_details')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\QuestionController::detailsAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/group/reports')) {
                if (0 === strpos($pathinfo, '/group/reports/membership')) {
                    // civix_front_group_report_membership
                    if ($pathinfo === '/group/reports/membership') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_group_report_membership;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_group_report_membership', 'https');
                        }

                        return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\ReportController::membershipAction',  '_route' => 'civix_front_group_report_membership',);
                    }
                    not_civix_front_group_report_membership:

                    // civix_front_group_report_downloadmembership
                    if ($pathinfo === '/group/reports/membership/download') {
                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_group_report_downloadmembership', 'https');
                        }

                        return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\ReportController::downloadMembershipAction',  '_route' => 'civix_front_group_report_downloadmembership',);
                    }

                }

                // civix_front_group_report_index
                if ($pathinfo === '/group/reports') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_group_report_index;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_report_index', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\ReportController::indexAction',  '_route' => 'civix_front_group_report_index',);
                }
                not_civix_front_group_report_index:

                // civix_front_group_report_question
                if (preg_match('#^/group/reports/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_group_report_question;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_report_question', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_report_question')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\ReportController::questionAction',));
                }
                not_civix_front_group_report_question:

                if (0 === strpos($pathinfo, '/group/reports/events')) {
                    // civix_front_group_report_events
                    if ($pathinfo === '/group/reports/events') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_group_report_events;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_group_report_events', 'https');
                        }

                        return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\ReportController::eventsAction',  '_route' => 'civix_front_group_report_events',);
                    }
                    not_civix_front_group_report_events:

                    // civix_front_group_report_event
                    if (preg_match('#^/group/reports/events/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_group_report_event;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_group_report_event', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_report_event')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\ReportController::eventAction',));
                    }
                    not_civix_front_group_report_event:

                }

                if (0 === strpos($pathinfo, '/group/reports/payment-requests')) {
                    // civix_front_group_report_payments
                    if ($pathinfo === '/group/reports/payment-requests') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_group_report_payments;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_group_report_payments', 'https');
                        }

                        return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\ReportController::paymentsAction',  '_route' => 'civix_front_group_report_payments',);
                    }
                    not_civix_front_group_report_payments:

                    // civix_front_group_report_payment
                    if (preg_match('#^/group/reports/payment\\-requests/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_group_report_payment;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_group_report_payment', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_report_payment')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\ReportController::paymentAction',));
                    }
                    not_civix_front_group_report_payment:

                }

            }

            if (0 === strpos($pathinfo, '/group/sections')) {
                // civix_front_group_sections_index
                if (rtrim($pathinfo, '/') === '/group/sections') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_group_sections_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'civix_front_group_sections_index');
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_sections_index', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\SectionsController::indexAction',  '_route' => 'civix_front_group_sections_index',);
                }
                not_civix_front_group_sections_index:

                // civix_front_group_sections_new
                if ($pathinfo === '/group/sections/new') {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_sections_new', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\SectionsController::newAction',  '_route' => 'civix_front_group_sections_new',);
                }

                // civix_front_group_sections_edit
                if (0 === strpos($pathinfo, '/group/sections/edit') && preg_match('#^/group/sections/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_sections_edit', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_sections_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\SectionsController::editAction',));
                }

                // civix_front_group_sections_view
                if (0 === strpos($pathinfo, '/group/sections/view') && preg_match('#^/group/sections/view/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_sections_view', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_sections_view')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\SectionsController::viewAction',));
                }

                // civix_front_group_sections_assign
                if (0 === strpos($pathinfo, '/group/sections/assign') && preg_match('#^/group/sections/assign/(?P<id>[^/]++)/(?P<user_id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_sections_assign', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_sections_assign')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\SectionsController::assignAction',));
                }

                // civix_front_group_sections_remove_user
                if (0 === strpos($pathinfo, '/group/sections/remove-user') && preg_match('#^/group/sections/remove\\-user/(?P<id>[^/]++)/(?P<user_id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_sections_remove_user', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_sections_remove_user')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\SectionsController::removeUserAction',));
                }

                // civix_front_group_sections_delete
                if (0 === strpos($pathinfo, '/group/sections/delete') && preg_match('#^/group/sections/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_sections_delete', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_sections_delete')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\SectionsController::deleteAction',));
                }

            }

            // civix_front_group_session_createleadersession
            if ($pathinfo === '/group/create-session') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_civix_front_group_session_createleadersession;
                }

                if ($this->context->getScheme() !== 'https') {
                    return $this->redirect($pathinfo, 'civix_front_group_session_createleadersession', 'https');
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\SessionController::createLeaderSession',  '_route' => 'civix_front_group_session_createleadersession',);
            }
            not_civix_front_group_session_createleadersession:

            if (0 === strpos($pathinfo, '/group/subscriptions')) {
                // civix_front_group_subscription_index
                if ($pathinfo === '/group/subscriptions') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_group_subscription_index;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_subscription_index', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\SubscriptionController::indexAction',  '_route' => 'civix_front_group_subscription_index',);
                }
                not_civix_front_group_subscription_index:

                // civix_front_group_subscription_subscribe
                if (preg_match('#^/group/subscriptions/(?P<id>20|30|40)/subscribe$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_subscription_subscribe', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_group_subscription_subscribe')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\SubscriptionController::subscribeAction',));
                }

                // civix_front_group_subscription_cancelsubscription
                if ($pathinfo === '/group/subscriptions/cancel') {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_group_subscription_cancelsubscription', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Group\\SubscriptionController::cancelSubscriptionAction',  '_route' => 'civix_front_group_subscription_cancelsubscription',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/superuser')) {
            if (0 === strpos($pathinfo, '/superuser/log')) {
                // civix_front_superuser_login_check
                if ($pathinfo === '/superuser/login_check') {
                    return array('_route' => 'civix_front_superuser_login_check');
                }

                // civix_superuser_logout
                if ($pathinfo === '/superuser/logout') {
                    return array('_route' => 'civix_superuser_logout');
                }

            }

            if (0 === strpos($pathinfo, '/superuser/discounts')) {
                // civix_front_superuser_discount_index
                if ($pathinfo === '/superuser/discounts') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_superuser_discount_index;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_discount_index', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\DiscountController::indexAction',  '_route' => 'civix_front_superuser_discount_index',);
                }
                not_civix_front_superuser_discount_index:

                // civix_front_superuser_discount_new
                if ($pathinfo === '/superuser/discounts/new') {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_discount_new', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\DiscountController::newAction',  '_route' => 'civix_front_superuser_discount_new',);
                }

                // civix_front_superuser_discount_edit
                if (0 === strpos($pathinfo, '/superuser/discounts/edit') && preg_match('#^/superuser/discounts/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_discount_edit', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_discount_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\DiscountController::editAction',));
                }

                // civix_front_superuser_discount_delete
                if (0 === strpos($pathinfo, '/superuser/discounts/delete') && preg_match('#^/superuser/discounts/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_discount_delete', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_discount_delete')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\DiscountController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/superuser/group')) {
                if (0 === strpos($pathinfo, '/superuser/group/limits')) {
                    // civix_front_superuser_group_limits
                    if (preg_match('#^/superuser/group/limits/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_superuser_group_limits;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_superuser_group_limits', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_group_limits')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\GroupController::limitsGroupAction',));
                    }
                    not_civix_front_superuser_group_limits:

                    // civix_front_superuser_group_limits_update
                    if (preg_match('#^/superuser/group/limits/(?P<id>[^/]++)/save$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_civix_front_superuser_group_limits_update;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_superuser_group_limits_update', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_group_limits_update')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\GroupController::limitsGroupEditAction',));
                    }
                    not_civix_front_superuser_group_limits_update:

                }

                // civix_front_superuser_group_remove
                if (0 === strpos($pathinfo, '/superuser/group/remove') && preg_match('#^/superuser/group/remove/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_civix_front_superuser_group_remove;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_group_remove', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_group_remove')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\GroupController::removeGroupAction',));
                }
                not_civix_front_superuser_group_remove:

                if (0 === strpos($pathinfo, '/superuser/group/s')) {
                    // civix_front_superuser_group_switch
                    if (0 === strpos($pathinfo, '/superuser/group/switch') && preg_match('#^/superuser/group/switch/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_superuser_group_switch', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_group_switch')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\GroupController::switchToStateGroup',));
                    }

                    if (0 === strpos($pathinfo, '/superuser/group/state')) {
                        // civix_front_superuser_state_groups
                        if ($pathinfo === '/superuser/group/state') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_front_superuser_state_groups;
                            }

                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_superuser_state_groups', 'https');
                            }

                            return array (  'countryGroup' => NULL,  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\GroupController::stateGroupAction',  '_route' => 'civix_front_superuser_state_groups',);
                        }
                        not_civix_front_superuser_state_groups:

                        // civix_front_superuser_country_groups_children
                        if (preg_match('#^/superuser/group/state/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_front_superuser_country_groups_children;
                            }

                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_superuser_country_groups_children', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_country_groups_children')), array (  'countryGroup' => NULL,  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\GroupController::stateGroupAction',));
                        }
                        not_civix_front_superuser_country_groups_children:

                    }

                }

                if (0 === strpos($pathinfo, '/superuser/group/local')) {
                    if (0 === strpos($pathinfo, '/superuser/group/local/assign')) {
                        // civix_front_superuser_local_groups_assign
                        if (preg_match('#^/superuser/group/local/assign/(?P<group>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_civix_front_superuser_local_groups_assign;
                            }

                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_superuser_local_groups_assign', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_local_groups_assign')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\GroupController::assignLocalGroup',));
                        }
                        not_civix_front_superuser_local_groups_assign:

                        // civix_front_superuser_local_groups_assign_save
                        if (preg_match('#^/superuser/group/local/assign/(?P<group>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_civix_front_superuser_local_groups_assign_save;
                            }

                            if ($this->context->getScheme() !== 'https') {
                                return $this->redirect($pathinfo, 'civix_front_superuser_local_groups_assign_save', 'https');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_local_groups_assign_save')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\GroupController::saveAssignLocalGroup',));
                        }
                        not_civix_front_superuser_local_groups_assign_save:

                    }

                    // civix_front_superuser_local_groups_by_parent
                    if (preg_match('#^/superuser/group/local/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_superuser_local_groups_by_parent;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_superuser_local_groups_by_parent', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_local_groups_by_parent')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\GroupController::localGroupActionByState',));
                    }
                    not_civix_front_superuser_local_groups_by_parent:

                    // civix_front_superuser_local_groups
                    if ($pathinfo === '/superuser/group/local') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_superuser_local_groups;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_superuser_local_groups', 'https');
                        }

                        return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\GroupController::localGroupAction',  '_route' => 'civix_front_superuser_local_groups',);
                    }
                    not_civix_front_superuser_local_groups:

                }

            }

            if (0 === strpos($pathinfo, '/superuser/post')) {
                // civix_front_superuser_post_index
                if ($pathinfo === '/superuser/post') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_superuser_post_index;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_post_index', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\PostController::indexAction',  '_route' => 'civix_front_superuser_post_index',);
                }
                not_civix_front_superuser_post_index:

                // civix_front_superuser_post_new
                if ($pathinfo === '/superuser/post/new') {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_post_new', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\PostController::newAction',  '_route' => 'civix_front_superuser_post_new',);
                }

                // civix_front_superuser_post_edit
                if (preg_match('#^/superuser/post/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_post_edit', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_post_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\PostController::editAction',));
                }

                // civix_front_superuser_post_delete
                if (0 === strpos($pathinfo, '/superuser/post/delete') && preg_match('#^/superuser/post/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_post_delete', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_post_delete')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\PostController::deleteAction',));
                }

                // civix_front_superuser_post_publish
                if (0 === strpos($pathinfo, '/superuser/post/publish') && preg_match('#^/superuser/post/publish/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_post_publish', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_post_publish')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\PostController::publishAction',));
                }

            }

            if (0 === strpos($pathinfo, '/superuser/question')) {
                // civix_front_superuser_question_index
                if ($pathinfo === '/superuser/question') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_superuser_question_index;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_question_index', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\QuestionController::indexAction',  '_route' => 'civix_front_superuser_question_index',);
                }
                not_civix_front_superuser_question_index:

                // civix_front_superuser_question_response
                if ($pathinfo === '/superuser/question/sending-out-response') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_superuser_question_response;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_question_response', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\QuestionController::responseAction',  '_route' => 'civix_front_superuser_question_response',);
                }
                not_civix_front_superuser_question_response:

                // civix_front_superuser_question_archive
                if ($pathinfo === '/superuser/question/archive') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_superuser_question_archive;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_question_archive', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\QuestionController::archiveAction',  '_route' => 'civix_front_superuser_question_archive',);
                }
                not_civix_front_superuser_question_archive:

                // civix_front_superuser_question_new
                if ($pathinfo === '/superuser/question/new') {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_question_new', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\QuestionController::newAction',  '_route' => 'civix_front_superuser_question_new',);
                }

                // civix_front_superuser_question_edit
                if (0 === strpos($pathinfo, '/superuser/question/edit') && preg_match('#^/superuser/question/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_question_edit', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_question_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\QuestionController::editAction',));
                }

                // civix_front_superuser_question_publish
                if (0 === strpos($pathinfo, '/superuser/question/publish') && preg_match('#^/superuser/question/publish/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_question_publish', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_question_publish')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\QuestionController::publishAction',));
                }

                if (0 === strpos($pathinfo, '/superuser/question/de')) {
                    // civix_front_superuser_question_delete
                    if (0 === strpos($pathinfo, '/superuser/question/delete') && preg_match('#^/superuser/question/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_superuser_question_delete', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_question_delete')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\QuestionController::deleteAction',));
                    }

                    // civix_front_superuser_question_details
                    if (0 === strpos($pathinfo, '/superuser/question/details') && preg_match('#^/superuser/question/details/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_superuser_question_details', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_question_details')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\QuestionController::detailsAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/superuser/reports')) {
                // civix_front_superuser_report_index
                if ($pathinfo === '/superuser/reports') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_superuser_report_index;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_report_index', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\ReportController::indexAction',  '_route' => 'civix_front_superuser_report_index',);
                }
                not_civix_front_superuser_report_index:

                // civix_front_superuser_report_question
                if (preg_match('#^/superuser/reports/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_superuser_report_question;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_report_question', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_report_question')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\ReportController::questionAction',));
                }
                not_civix_front_superuser_report_question:

                if (0 === strpos($pathinfo, '/superuser/reports/events')) {
                    // civix_front_superuser_report_events
                    if ($pathinfo === '/superuser/reports/events') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_superuser_report_events;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_superuser_report_events', 'https');
                        }

                        return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\ReportController::eventsAction',  '_route' => 'civix_front_superuser_report_events',);
                    }
                    not_civix_front_superuser_report_events:

                    // civix_front_superuser_report_event
                    if (preg_match('#^/superuser/reports/events/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_superuser_report_event;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_superuser_report_event', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_report_event')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\ReportController::eventAction',));
                    }
                    not_civix_front_superuser_report_event:

                }

                if (0 === strpos($pathinfo, '/superuser/reports/payment-requests')) {
                    // civix_front_superuser_report_payments
                    if ($pathinfo === '/superuser/reports/payment-requests') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_superuser_report_payments;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_superuser_report_payments', 'https');
                        }

                        return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\ReportController::paymentsAction',  '_route' => 'civix_front_superuser_report_payments',);
                    }
                    not_civix_front_superuser_report_payments:

                    // civix_front_superuser_report_payment
                    if (preg_match('#^/superuser/reports/payment\\-requests/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_superuser_report_payment;
                        }

                        if ($this->context->getScheme() !== 'https') {
                            return $this->redirect($pathinfo, 'civix_front_superuser_report_payment', 'https');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_report_payment')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\ReportController::paymentAction',));
                    }
                    not_civix_front_superuser_report_payment:

                }

            }

            if (0 === strpos($pathinfo, '/superuser/settings/states')) {
                // civix_front_superuser_settings_states
                if ($pathinfo === '/superuser/settings/states') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_civix_front_superuser_settings_states;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_settings_states', 'https');
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\SettingsController::statesListAction',  '_route' => 'civix_front_superuser_settings_states',);
                }
                not_civix_front_superuser_settings_states:

                // civix_front_superuser_settings_states_update
                if (preg_match('#^/superuser/settings/states/(?P<state>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_civix_front_superuser_settings_states_update;
                    }

                    if ($this->context->getScheme() !== 'https') {
                        return $this->redirect($pathinfo, 'civix_front_superuser_settings_states_update', 'https');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_settings_states_update')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\Superuser\\SettingsController::statesUpdateAction',));
                }
                not_civix_front_superuser_settings_states_update:

            }

            // civix_front_superuser
            if (rtrim($pathinfo, '/') === '/superuser') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_civix_front_superuser;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'civix_front_superuser');
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\SuperuserController::indexAction',  '_route' => 'civix_front_superuser',);
            }
            not_civix_front_superuser:

            // civix_front_superuser_approvals
            if ($pathinfo === '/superuser/approvals') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_civix_front_superuser_approvals;
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\SuperuserController::approvalsAction',  '_route' => 'civix_front_superuser_approvals',);
            }
            not_civix_front_superuser_approvals:

            if (0 === strpos($pathinfo, '/superuser/representative')) {
                // civix_front_superuser_representative_edit
                if (0 === strpos($pathinfo, '/superuser/representative/edit') && preg_match('#^/superuser/representative/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_civix_front_superuser_representative_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_representative_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\SuperuserController::editRepresentativeAction',));
                }
                not_civix_front_superuser_representative_edit:

                // civix_front_superuser_representative_delete
                if (0 === strpos($pathinfo, '/superuser/representative/delete') && preg_match('#^/superuser/representative/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_civix_front_superuser_representative_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_representative_delete')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\SuperuserController::deleteRepresentativeAction',));
                }
                not_civix_front_superuser_representative_delete:

                // civix_front_superuser_representative_approve
                if (0 === strpos($pathinfo, '/superuser/representative/approve') && preg_match('#^/superuser/representative/approve/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_civix_front_superuser_representative_approve;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_representative_approve')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\SuperuserController::approveRepresentativeAction',));
                }
                not_civix_front_superuser_representative_approve:

            }

            // civix_front_superuser_login
            if ($pathinfo === '/superuser/login') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_civix_front_superuser_login;
                }

                return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\SuperuserController::loginAction',  '_route' => 'civix_front_superuser_login',);
            }
            not_civix_front_superuser_login:

            if (0 === strpos($pathinfo, '/superuser/manage')) {
                // civix_front_superuser_manage_representatives
                if ($pathinfo === '/superuser/manage/representatives') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_superuser_manage_representatives;
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\SuperuserController::manageRepresentativesAction',  '_route' => 'civix_front_superuser_manage_representatives',);
                }
                not_civix_front_superuser_manage_representatives:

                // civix_front_superuser_manage_groups
                if ($pathinfo === '/superuser/manage/groups') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_superuser_manage_groups;
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\SuperuserController::manageGroupsAction',  '_route' => 'civix_front_superuser_manage_groups',);
                }
                not_civix_front_superuser_manage_groups:

                if (0 === strpos($pathinfo, '/superuser/manage/users')) {
                    // civix_front_superuser_manage_users
                    if ($pathinfo === '/superuser/manage/users') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_superuser_manage_users;
                        }

                        return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\SuperuserController::manageUsersAction',  '_route' => 'civix_front_superuser_manage_users',);
                    }
                    not_civix_front_superuser_manage_users:

                    // civix_front_superuser_reset_user_password
                    if (preg_match('#^/superuser/manage/users/(?P<id>[^/]++)/reset\\-password$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_civix_front_superuser_reset_user_password;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_reset_user_password')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\SuperuserController::resetUserPasswordAction',));
                    }
                    not_civix_front_superuser_reset_user_password:

                }

                // civix_front_superuser_manage_limits
                if ($pathinfo === '/superuser/manage/limits') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_superuser_manage_limits;
                    }

                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\SuperuserController::manageLimitsAction',  '_route' => 'civix_front_superuser_manage_limits',);
                }
                not_civix_front_superuser_manage_limits:

            }

            // civix_front_superuser_representative_remove
            if (0 === strpos($pathinfo, '/superuser/representative/remove') && preg_match('#^/superuser/representative/remove/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_civix_front_superuser_representative_remove;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_representative_remove')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\SuperuserController::removeRepresentativeAction',));
            }
            not_civix_front_superuser_representative_remove:

            if (0 === strpos($pathinfo, '/superuser/limits')) {
                // civix_front_superuser_limit_edit
                if (0 === strpos($pathinfo, '/superuser/limits/edit') && preg_match('#^/superuser/limits/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_superuser_limit_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_limit_edit')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\SuperuserController::defaultLimitEditAction',));
                }
                not_civix_front_superuser_limit_edit:

                // civix_front_superuser_limit_save
                if (0 === strpos($pathinfo, '/superuser/limits/save') && preg_match('#^/superuser/limits/save/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_civix_front_superuser_limit_save;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_limit_save')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\SuperuserController::defaultLimitSaveAction',));
                }
                not_civix_front_superuser_limit_save:

            }

            if (0 === strpos($pathinfo, '/superuser/representative/limits')) {
                // civix_front_superuser_representative_limits
                if (preg_match('#^/superuser/representative/limits/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_civix_front_superuser_representative_limits;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_representative_limits')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\SuperuserController::limitsRepresentativeAction',));
                }
                not_civix_front_superuser_representative_limits:

                // civix_front_superuser_representative_limits_update
                if (preg_match('#^/superuser/representative/limits/(?P<id>[^/]++)/save$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_civix_front_superuser_representative_limits_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_representative_limits_update')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\SuperuserController::limitsRepresentativeEditAction',));
                }
                not_civix_front_superuser_representative_limits_update:

            }

            // civix_front_superuser_user_remove
            if (0 === strpos($pathinfo, '/superuser/user/remove') && preg_match('#^/superuser/user/remove/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_civix_front_superuser_user_remove;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'civix_front_superuser_user_remove')), array (  '_controller' => 'Civix\\FrontBundle\\Controller\\SuperuserController::removeUserAction',));
            }
            not_civix_front_superuser_user_remove:

        }

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/account')) {
                // civix_account_switch
                if ($pathinfo === '/account/switch') {
                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\AccountController::switchAction',  '_route' => 'civix_account_switch',);
                }

                // civix_account_exit_switch
                if ($pathinfo === '/account/exit-switch') {
                    return array (  '_controller' => 'Civix\\FrontBundle\\Controller\\AccountController::exitSwitchAction',  '_route' => 'civix_account_exit_switch',);
                }

            }

            // nelmio_api_doc_index
            if (rtrim($pathinfo, '/') === '/api-doc') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_nelmio_api_doc_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'nelmio_api_doc_index');
                }

                return array (  '_controller' => 'Nelmio\\ApiDocBundle\\Controller\\ApiDocController::indexAction',  '_route' => 'nelmio_api_doc_index',);
            }
            not_nelmio_api_doc_index:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
