<?php

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InactiveScopeException;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * appDevDebugProjectContainer
 *
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 */
class appDevDebugProjectContainer extends Container
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->parameters = $this->getDefaultParameters();

        $this->services =
        $this->scopedServices =
        $this->scopeStacks = array();

        $this->set('service_container', $this);

        $this->scopes = array('request' => 'container');
        $this->scopeChildren = array('request' => array());
        $this->methodMap = array(
            'annotation_reader' => 'getAnnotationReaderService',
            'api.cors' => 'getApi_CorsService',
            'assetic.asset_factory' => 'getAssetic_AssetFactoryService',
            'assetic.asset_manager' => 'getAssetic_AssetManagerService',
            'assetic.filter.cssrewrite' => 'getAssetic_Filter_CssrewriteService',
            'assetic.filter.lessphp' => 'getAssetic_Filter_LessphpService',
            'assetic.filter_manager' => 'getAssetic_FilterManagerService',
            'aws_s3.client' => 'getAwsS3_ClientService',
            'aws_ses.client' => 'getAwsSes_ClientService',
            'aws_sns.client' => 'getAwsSns_ClientService',
            'cache_clearer' => 'getCacheClearerService',
            'cache_warmer' => 'getCacheWarmerService',
            'civix_balanced.payment_calls' => 'getCivixBalanced_PaymentCallsService',
            'civix_balanced.payment_manager' => 'getCivixBalanced_PaymentManagerService',
            'civix_core.account_manager' => 'getCivixCore_AccountManagerService',
            'civix_core.activity_update' => 'getCivixCore_ActivityUpdateService',
            'civix_core.answer_model_param_converter' => 'getCivixCore_AnswerModelParamConverterService',
            'civix_core.cicero_api' => 'getCivixCore_CiceroApiService',
            'civix_core.cicero_calls' => 'getCivixCore_CiceroCallsService',
            'civix_core.comment_model_param_converter' => 'getCivixCore_CommentModelParamConverterService',
            'civix_core.congress_api' => 'getCivixCore_CongressApiService',
            'civix_core.content_manager' => 'getCivixCore_ContentManagerService',
            'civix_core.crop_avatar' => 'getCivixCore_CropAvatarService',
            'civix_core.crop_image' => 'getCivixCore_CropImageService',
            'civix_core.crop_image.form.type' => 'getCivixCore_CropImage_Form_TypeService',
            'civix_core.customer_manager' => 'getCivixCore_CustomerManagerService',
            'civix_core.deserializer.handler.avatar_handler' => 'getCivixCore_Deserializer_Handler_AvatarHandlerService',
            'civix_core.discount_code_manager' => 'getCivixCore_DiscountCodeManagerService',
            'civix_core.editable_avatar.form.type' => 'getCivixCore_EditableAvatar_Form_TypeService',
            'civix_core.email_sender' => 'getCivixCore_EmailSenderService',
            'civix_core.facebook_api' => 'getCivixCore_FacebookApiService',
            'civix_core.geocode' => 'getCivixCore_GeocodeService',
            'civix_core.group_manager' => 'getCivixCore_GroupManagerService',
            'civix_core.invite_sender' => 'getCivixCore_InviteSenderService',
            'civix_core.mailgun' => 'getCivixCore_MailgunService',
            'civix_core.notification' => 'getCivixCore_NotificationService',
            'civix_core.openstates_api' => 'getCivixCore_OpenstatesApiService',
            'civix_core.orders_manager' => 'getCivixCore_OrdersManagerService',
            'civix_core.package_handler' => 'getCivixCore_PackageHandlerService',
            'civix_core.payments' => 'getCivixCore_PaymentsService',
            'civix_core.payments_transaction_manager' => 'getCivixCore_PaymentsTransactionManagerService',
            'civix_core.poll.answer_manager' => 'getCivixCore_Poll_AnswerManagerService',
            'civix_core.poll.comment_manager' => 'getCivixCore_Poll_CommentManagerService',
            'civix_core.poll.micropetition_manager' => 'getCivixCore_Poll_MicropetitionManagerService',
            'civix_core.push_sender' => 'getCivixCore_PushSenderService',
            'civix_core.push_task' => 'getCivixCore_PushTaskService',
            'civix_core.question_limit' => 'getCivixCore_QuestionLimitService',
            'civix_core.question_users_push' => 'getCivixCore_QuestionUsersPushService',
            'civix_core.queue_task' => 'getCivixCore_QueueTaskService',
            'civix_core.rabbit.push_queue' => 'getCivixCore_Rabbit_PushQueueService',
            'civix_core.rabbit.push_test' => 'getCivixCore_Rabbit_PushTestService',
            'civix_core.representative_manager' => 'getCivixCore_RepresentativeManagerService',
            'civix_core.representative_storage_manager' => 'getCivixCore_RepresentativeStorageManagerService',
            'civix_core.s3client_api' => 'getCivixCore_S3clientApiService',
            'civix_core.serializer.handler.avatar_handler' => 'getCivixCore_Serializer_Handler_AvatarHandlerService',
            'civix_core.serializer.handler.image_handler' => 'getCivixCore_Serializer_Handler_ImageHandlerService',
            'civix_core.serializer.handler.join_status_handler' => 'getCivixCore_Serializer_Handler_JoinStatusHandlerService',
            'civix_core.serializer.handler.owner_data_handler' => 'getCivixCore_Serializer_Handler_OwnerDataHandlerService',
            'civix_core.settings' => 'getCivixCore_SettingsService',
            'civix_core.social_activity_manager' => 'getCivixCore_SocialActivityManagerService',
            'civix_core.stripe' => 'getCivixCore_StripeService',
            'civix_core.subscription_manager' => 'getCivixCore_SubscriptionManagerService',
            'civix_core.user_manager' => 'getCivixCore_UserManagerService',
            'civix_core.validator.facebook_token' => 'getCivixCore_Validator_FacebookTokenService',
            'civix_core.validator.not_joined_to_group' => 'getCivixCore_Validator_NotJoinedToGroupService',
            'civix_front.form.representative.question' => 'getCivixFront_Form_Representative_QuestionService',
            'civix_front.group_members' => 'getCivixFront_GroupMembersService',
            'civix_front.manage' => 'getCivixFront_ManageService',
            'civix_front.micro_petition' => 'getCivixFront_MicroPetitionService',
            'civix_front.navbar' => 'getCivixFront_NavbarService',
            'civix_front.navbar_group_members_menu' => 'getCivixFront_NavbarGroupMembersMenuService',
            'civix_front.navbar_main_menu' => 'getCivixFront_NavbarMainMenuService',
            'civix_front.navbar_manage_menu' => 'getCivixFront_NavbarManageMenuService',
            'civix_front.navbar_menu_builder' => 'getCivixFront_NavbarMenuBuilderService',
            'civix_front.navbar_micro_petition_menu' => 'getCivixFront_NavbarMicroPetitionMenuService',
            'civix_front.navbar_petition_menu' => 'getCivixFront_NavbarPetitionMenuService',
            'civix_front.navbar_question_menu' => 'getCivixFront_NavbarQuestionMenuService',
            'civix_front.navbar_question_options' => 'getCivixFront_NavbarQuestionOptionsService',
            'civix_front.navbar_settings_menu' => 'getCivixFront_NavbarSettingsMenuService',
            'civix_front.petition' => 'getCivixFront_PetitionService',
            'civix_front.question' => 'getCivixFront_QuestionService',
            'civix_front.settings' => 'getCivixFront_SettingsService',
            'civix_load.generator' => 'getCivixLoad_GeneratorService',
            'controller_name_converter' => 'getControllerNameConverterService',
            'data_collector.request' => 'getDataCollector_RequestService',
            'data_collector.router' => 'getDataCollector_RouterService',
            'debug.controller_resolver' => 'getDebug_ControllerResolverService',
            'debug.deprecation_logger_listener' => 'getDebug_DeprecationLoggerListenerService',
            'debug.emergency_logger_listener' => 'getDebug_EmergencyLoggerListenerService',
            'debug.event_dispatcher' => 'getDebug_EventDispatcherService',
            'debug.stopwatch' => 'getDebug_StopwatchService',
            'debug.templating.engine.php' => 'getDebug_Templating_Engine_PhpService',
            'doctrine' => 'getDoctrineService',
            'doctrine.dbal.connection_factory' => 'getDoctrine_Dbal_ConnectionFactoryService',
            'doctrine.dbal.default_connection' => 'getDoctrine_Dbal_DefaultConnectionService',
            'doctrine.dbal.logger.profiling.default' => 'getDoctrine_Dbal_Logger_Profiling_DefaultService',
            'doctrine.orm.default_entity_manager' => 'getDoctrine_Orm_DefaultEntityManagerService',
            'doctrine.orm.default_manager_configurator' => 'getDoctrine_Orm_DefaultManagerConfiguratorService',
            'doctrine.orm.validator.unique' => 'getDoctrine_Orm_Validator_UniqueService',
            'doctrine.orm.validator_initializer' => 'getDoctrine_Orm_ValidatorInitializerService',
            'event_dispatcher' => 'getEventDispatcherService',
            'ewz_recaptcha.form.type' => 'getEwzRecaptcha_Form_TypeService',
            'ewz_recaptcha.validator.true' => 'getEwzRecaptcha_Validator_TrueService',
            'file_locator' => 'getFileLocatorService',
            'filesystem' => 'getFilesystemService',
            'form.csrf_provider' => 'getForm_CsrfProviderService',
            'form.factory' => 'getForm_FactoryService',
            'form.registry' => 'getForm_RegistryService',
            'form.resolved_type_factory' => 'getForm_ResolvedTypeFactoryService',
            'form.type.birthday' => 'getForm_Type_BirthdayService',
            'form.type.button' => 'getForm_Type_ButtonService',
            'form.type.checkbox' => 'getForm_Type_CheckboxService',
            'form.type.choice' => 'getForm_Type_ChoiceService',
            'form.type.collection' => 'getForm_Type_CollectionService',
            'form.type.country' => 'getForm_Type_CountryService',
            'form.type.currency' => 'getForm_Type_CurrencyService',
            'form.type.date' => 'getForm_Type_DateService',
            'form.type.datetime' => 'getForm_Type_DatetimeService',
            'form.type.email' => 'getForm_Type_EmailService',
            'form.type.entity' => 'getForm_Type_EntityService',
            'form.type.file' => 'getForm_Type_FileService',
            'form.type.form' => 'getForm_Type_FormService',
            'form.type.hidden' => 'getForm_Type_HiddenService',
            'form.type.integer' => 'getForm_Type_IntegerService',
            'form.type.language' => 'getForm_Type_LanguageService',
            'form.type.locale' => 'getForm_Type_LocaleService',
            'form.type.money' => 'getForm_Type_MoneyService',
            'form.type.number' => 'getForm_Type_NumberService',
            'form.type.password' => 'getForm_Type_PasswordService',
            'form.type.percent' => 'getForm_Type_PercentService',
            'form.type.radio' => 'getForm_Type_RadioService',
            'form.type.repeated' => 'getForm_Type_RepeatedService',
            'form.type.reset' => 'getForm_Type_ResetService',
            'form.type.search' => 'getForm_Type_SearchService',
            'form.type.submit' => 'getForm_Type_SubmitService',
            'form.type.text' => 'getForm_Type_TextService',
            'form.type.textarea' => 'getForm_Type_TextareaService',
            'form.type.time' => 'getForm_Type_TimeService',
            'form.type.timezone' => 'getForm_Type_TimezoneService',
            'form.type.url' => 'getForm_Type_UrlService',
            'form.type_extension.csrf' => 'getForm_TypeExtension_CsrfService',
            'form.type_extension.form.http_foundation' => 'getForm_TypeExtension_Form_HttpFoundationService',
            'form.type_extension.form.validator' => 'getForm_TypeExtension_Form_ValidatorService',
            'form.type_extension.repeated.validator' => 'getForm_TypeExtension_Repeated_ValidatorService',
            'form.type_extension.submit.validator' => 'getForm_TypeExtension_Submit_ValidatorService',
            'form.type_guesser.doctrine' => 'getForm_TypeGuesser_DoctrineService',
            'form.type_guesser.validator' => 'getForm_TypeGuesser_ValidatorService',
            'fragment.handler' => 'getFragment_HandlerService',
            'fragment.renderer.hinclude' => 'getFragment_Renderer_HincludeService',
            'fragment.renderer.inline' => 'getFragment_Renderer_InlineService',
            'gaufrette.avatar_image_fs_filesystem' => 'getGaufrette_AvatarImageFsFilesystemService',
            'gaufrette.avatar_representative_fs_filesystem' => 'getGaufrette_AvatarRepresentativeFsFilesystemService',
            'gaufrette.avatar_source_image_fs_filesystem' => 'getGaufrette_AvatarSourceImageFsFilesystemService',
            'gaufrette.blog_post_fs_filesystem' => 'getGaufrette_BlogPostFsFilesystemService',
            'gaufrette.educational_image_fs_filesystem' => 'getGaufrette_EducationalImageFsFilesystemService',
            'http_kernel' => 'getHttpKernelService',
            'jms_aop.interceptor_loader' => 'getJmsAop_InterceptorLoaderService',
            'jms_aop.pointcut_container' => 'getJmsAop_PointcutContainerService',
            'jms_di_extra.controller_resolver' => 'getJmsDiExtra_ControllerResolverService',
            'jms_di_extra.metadata.converter' => 'getJmsDiExtra_Metadata_ConverterService',
            'jms_di_extra.metadata.metadata_factory' => 'getJmsDiExtra_Metadata_MetadataFactoryService',
            'jms_di_extra.metadata_driver' => 'getJmsDiExtra_MetadataDriverService',
            'jms_serializer' => 'getJmsSerializerService',
            'jms_serializer.array_collection_handler' => 'getJmsSerializer_ArrayCollectionHandlerService',
            'jms_serializer.constraint_violation_handler' => 'getJmsSerializer_ConstraintViolationHandlerService',
            'jms_serializer.datetime_handler' => 'getJmsSerializer_DatetimeHandlerService',
            'jms_serializer.doctrine_proxy_subscriber' => 'getJmsSerializer_DoctrineProxySubscriberService',
            'jms_serializer.form_error_handler' => 'getJmsSerializer_FormErrorHandlerService',
            'jms_serializer.handler_registry' => 'getJmsSerializer_HandlerRegistryService',
            'jms_serializer.json_deserialization_visitor' => 'getJmsSerializer_JsonDeserializationVisitorService',
            'jms_serializer.json_serialization_visitor' => 'getJmsSerializer_JsonSerializationVisitorService',
            'jms_serializer.metadata_driver' => 'getJmsSerializer_MetadataDriverService',
            'jms_serializer.metadata_factory' => 'getJmsSerializer_MetadataFactoryService',
            'jms_serializer.naming_strategy' => 'getJmsSerializer_NamingStrategyService',
            'jms_serializer.object_constructor' => 'getJmsSerializer_ObjectConstructorService',
            'jms_serializer.php_collection_handler' => 'getJmsSerializer_PhpCollectionHandlerService',
            'jms_serializer.stopwatch_subscriber' => 'getJmsSerializer_StopwatchSubscriberService',
            'jms_serializer.templating.helper.serializer' => 'getJmsSerializer_Templating_Helper_SerializerService',
            'jms_serializer.unserialize_object_constructor' => 'getJmsSerializer_UnserializeObjectConstructorService',
            'jms_serializer.xml_deserialization_visitor' => 'getJmsSerializer_XmlDeserializationVisitorService',
            'jms_serializer.xml_serialization_visitor' => 'getJmsSerializer_XmlSerializationVisitorService',
            'jms_serializer.yaml_serialization_visitor' => 'getJmsSerializer_YamlSerializationVisitorService',
            'kernel' => 'getKernelService',
            'knp_gaufrette.filesystem_map' => 'getKnpGaufrette_FilesystemMapService',
            'knp_menu.factory' => 'getKnpMenu_FactoryService',
            'knp_menu.listener.voters' => 'getKnpMenu_Listener_VotersService',
            'knp_menu.matcher' => 'getKnpMenu_MatcherService',
            'knp_menu.menu_provider' => 'getKnpMenu_MenuProviderService',
            'knp_menu.renderer.list' => 'getKnpMenu_Renderer_ListService',
            'knp_menu.renderer.twig' => 'getKnpMenu_Renderer_TwigService',
            'knp_menu.renderer_provider' => 'getKnpMenu_RendererProviderService',
            'knp_menu.voter.router' => 'getKnpMenu_Voter_RouterService',
            'knp_paginator' => 'getKnpPaginatorService',
            'knp_paginator.helper.processor' => 'getKnpPaginator_Helper_ProcessorService',
            'knp_paginator.subscriber.filtration' => 'getKnpPaginator_Subscriber_FiltrationService',
            'knp_paginator.subscriber.paginate' => 'getKnpPaginator_Subscriber_PaginateService',
            'knp_paginator.subscriber.sliding_pagination' => 'getKnpPaginator_Subscriber_SlidingPaginationService',
            'knp_paginator.subscriber.sortable' => 'getKnpPaginator_Subscriber_SortableService',
            'knp_paginator.templating.helper.pagination' => 'getKnpPaginator_Templating_Helper_PaginationService',
            'knp_paginator.twig.extension.pagination' => 'getKnpPaginator_Twig_Extension_PaginationService',
            'locale_listener' => 'getLocaleListenerService',
            'logger' => 'getLoggerService',
            'monolog.handler.debug' => 'getMonolog_Handler_DebugService',
            'monolog.handler.firephp' => 'getMonolog_Handler_FirephpService',
            'monolog.handler.main' => 'getMonolog_Handler_MainService',
            'monolog.handler.pushsender' => 'getMonolog_Handler_PushsenderService',
            'monolog.logger.deprecation' => 'getMonolog_Logger_DeprecationService',
            'monolog.logger.doctrine' => 'getMonolog_Logger_DoctrineService',
            'monolog.logger.emergency' => 'getMonolog_Logger_EmergencyService',
            'monolog.logger.event' => 'getMonolog_Logger_EventService',
            'monolog.logger.profiler' => 'getMonolog_Logger_ProfilerService',
            'monolog.logger.pushsender' => 'getMonolog_Logger_PushsenderService',
            'monolog.logger.request' => 'getMonolog_Logger_RequestService',
            'monolog.logger.router' => 'getMonolog_Logger_RouterService',
            'monolog.logger.security' => 'getMonolog_Logger_SecurityService',
            'monolog.logger.templating' => 'getMonolog_Logger_TemplatingService',
            'mopa.form.date_extension' => 'getMopa_Form_DateExtensionService',
            'mopa.form.error_type_extension' => 'getMopa_Form_ErrorTypeExtensionService',
            'mopa.form.help_extension' => 'getMopa_Form_HelpExtensionService',
            'mopa.form.hexcolor_type' => 'getMopa_Form_HexcolorTypeService',
            'mopa.form.icon_button_extension' => 'getMopa_Form_IconButtonExtensionService',
            'mopa.form.legend_extension' => 'getMopa_Form_LegendExtensionService',
            'mopa.form.tab_type' => 'getMopa_Form_TabTypeService',
            'mopa.form.tabbed_extension' => 'getMopa_Form_TabbedExtensionService',
            'mopa.form.widget_collection_extension' => 'getMopa_Form_WidgetCollectionExtensionService',
            'mopa.form.widget_extension' => 'getMopa_Form_WidgetExtensionService',
            'mopa_bootstrap.navbar.twig.extension' => 'getMopaBootstrap_Navbar_Twig_ExtensionService',
            'mopa_bootstrap.navbar_renderer' => 'getMopaBootstrap_NavbarRendererService',
            'nelmio_api_doc.doc_comment_extractor' => 'getNelmioApiDoc_DocCommentExtractorService',
            'nelmio_api_doc.event_listener.request' => 'getNelmioApiDoc_EventListener_RequestService',
            'nelmio_api_doc.extractor.api_doc_extractor' => 'getNelmioApiDoc_Extractor_ApiDocExtractorService',
            'nelmio_api_doc.form.extension.description_form_type_extension' => 'getNelmioApiDoc_Form_Extension_DescriptionFormTypeExtensionService',
            'nelmio_api_doc.formatter.abstract_formatter' => 'getNelmioApiDoc_Formatter_AbstractFormatterService',
            'nelmio_api_doc.formatter.html_formatter' => 'getNelmioApiDoc_Formatter_HtmlFormatterService',
            'nelmio_api_doc.formatter.markdown_formatter' => 'getNelmioApiDoc_Formatter_MarkdownFormatterService',
            'nelmio_api_doc.formatter.simple_formatter' => 'getNelmioApiDoc_Formatter_SimpleFormatterService',
            'nelmio_api_doc.parser.form_type_parser' => 'getNelmioApiDoc_Parser_FormTypeParserService',
            'nelmio_api_doc.parser.jms_metadata_parser' => 'getNelmioApiDoc_Parser_JmsMetadataParserService',
            'nelmio_api_doc.twig.extension.extra_markdown' => 'getNelmioApiDoc_Twig_Extension_ExtraMarkdownService',
            'old_sound_rabbit_mq.connection.default' => 'getOldSoundRabbitMq_Connection_DefaultService',
            'old_sound_rabbit_mq.push_producer' => 'getOldSoundRabbitMq_PushProducerService',
            'old_sound_rabbit_mq.push_queue_consumer' => 'getOldSoundRabbitMq_PushQueueConsumerService',
            'old_sound_rabbit_mq.push_queue_producer' => 'getOldSoundRabbitMq_PushQueueProducerService',
            'profiler' => 'getProfilerService',
            'profiler_listener' => 'getProfilerListenerService',
            'property_accessor' => 'getPropertyAccessorService',
            'request' => 'getRequestService',
            'response_listener' => 'getResponseListenerService',
            'rms_push_notifications' => 'getRmsPushNotificationsService',
            'router' => 'getRouterService',
            'router.request_context' => 'getRouter_RequestContextService',
            'router_listener' => 'getRouterListenerService',
            'routing.loader' => 'getRouting_LoaderService',
            'security.access.decision_manager' => 'getSecurity_Access_DecisionManagerService',
            'security.access.method_interceptor' => 'getSecurity_Access_MethodInterceptorService',
            'security.access.pointcut' => 'getSecurity_Access_PointcutService',
            'security.access_listener' => 'getSecurity_AccessListenerService',
            'security.access_map' => 'getSecurity_AccessMapService',
            'security.authentication.manager' => 'getSecurity_Authentication_ManagerService',
            'security.authentication.session_strategy' => 'getSecurity_Authentication_SessionStrategyService',
            'security.authentication.trust_resolver' => 'getSecurity_Authentication_TrustResolverService',
            'security.channel_listener' => 'getSecurity_ChannelListenerService',
            'security.context' => 'getSecurity_ContextService',
            'security.encoder_factory' => 'getSecurity_EncoderFactoryService',
            'security.expressions.compiler' => 'getSecurity_Expressions_CompilerService',
            'security.expressions.handler' => 'getSecurity_Expressions_HandlerService',
            'security.expressions.reverse_interpreter' => 'getSecurity_Expressions_ReverseInterpreterService',
            'security.extra.metadata_driver' => 'getSecurity_Extra_MetadataDriverService',
            'security.extra.metadata_factory' => 'getSecurity_Extra_MetadataFactoryService',
            'security.firewall' => 'getSecurity_FirewallService',
            'security.firewall.map.context.group_login' => 'getSecurity_Firewall_Map_Context_GroupLoginService',
            'security.firewall.map.context.group_registration' => 'getSecurity_Firewall_Map_Context_GroupRegistrationService',
            'security.firewall.map.context.group_security_area' => 'getSecurity_Firewall_Map_Context_GroupSecurityAreaService',
            'security.firewall.map.context.leader_api_login' => 'getSecurity_Firewall_Map_Context_LeaderApiLoginService',
            'security.firewall.map.context.leader_api_secure_area' => 'getSecurity_Firewall_Map_Context_LeaderApiSecureAreaService',
            'security.firewall.map.context.mobileuser_facebook_login' => 'getSecurity_Firewall_Map_Context_MobileuserFacebookLoginService',
            'security.firewall.map.context.mobileuser_facebook_registration' => 'getSecurity_Firewall_Map_Context_MobileuserFacebookRegistrationService',
            'security.firewall.map.context.mobileuser_forgot_password' => 'getSecurity_Firewall_Map_Context_MobileuserForgotPasswordService',
            'security.firewall.map.context.mobileuser_login' => 'getSecurity_Firewall_Map_Context_MobileuserLoginService',
            'security.firewall.map.context.mobileuser_registration' => 'getSecurity_Firewall_Map_Context_MobileuserRegistrationService',
            'security.firewall.map.context.mobileuser_request_beta' => 'getSecurity_Firewall_Map_Context_MobileuserRequestBetaService',
            'security.firewall.map.context.mobileuser_reset_token' => 'getSecurity_Firewall_Map_Context_MobileuserResetTokenService',
            'security.firewall.map.context.mobileuser_security_area' => 'getSecurity_Firewall_Map_Context_MobileuserSecurityAreaService',
            'security.firewall.map.context.other_area' => 'getSecurity_Firewall_Map_Context_OtherAreaService',
            'security.firewall.map.context.public_api' => 'getSecurity_Firewall_Map_Context_PublicApiService',
            'security.firewall.map.context.representative_login' => 'getSecurity_Firewall_Map_Context_RepresentativeLoginService',
            'security.firewall.map.context.representative_registration' => 'getSecurity_Firewall_Map_Context_RepresentativeRegistrationService',
            'security.firewall.map.context.representative_security_area' => 'getSecurity_Firewall_Map_Context_RepresentativeSecurityAreaService',
            'security.firewall.map.context.superuser_login' => 'getSecurity_Firewall_Map_Context_SuperuserLoginService',
            'security.firewall.map.context.superuser_security_area' => 'getSecurity_Firewall_Map_Context_SuperuserSecurityAreaService',
            'security.http_utils' => 'getSecurity_HttpUtilsService',
            'security.logout.handler.session' => 'getSecurity_Logout_Handler_SessionService',
            'security.rememberme.response_listener' => 'getSecurity_Rememberme_ResponseListenerService',
            'security.role_hierarchy' => 'getSecurity_RoleHierarchyService',
            'security.secure_random' => 'getSecurity_SecureRandomService',
            'security.user.provider.concrete.group' => 'getSecurity_User_Provider_Concrete_GroupService',
            'security.user.provider.concrete.mobileuser' => 'getSecurity_User_Provider_Concrete_MobileuserService',
            'security.user.provider.concrete.representative' => 'getSecurity_User_Provider_Concrete_RepresentativeService',
            'security.user.provider.concrete.superuser' => 'getSecurity_User_Provider_Concrete_SuperuserService',
            'security.validator.user_password' => 'getSecurity_Validator_UserPasswordService',
            'sensio_distribution.webconfigurator' => 'getSensioDistribution_WebconfiguratorService',
            'sensio_framework_extra.cache.listener' => 'getSensioFrameworkExtra_Cache_ListenerService',
            'sensio_framework_extra.controller.listener' => 'getSensioFrameworkExtra_Controller_ListenerService',
            'sensio_framework_extra.converter.datetime' => 'getSensioFrameworkExtra_Converter_DatetimeService',
            'sensio_framework_extra.converter.doctrine.orm' => 'getSensioFrameworkExtra_Converter_Doctrine_OrmService',
            'sensio_framework_extra.converter.listener' => 'getSensioFrameworkExtra_Converter_ListenerService',
            'sensio_framework_extra.converter.manager' => 'getSensioFrameworkExtra_Converter_ManagerService',
            'sensio_framework_extra.view.guesser' => 'getSensioFrameworkExtra_View_GuesserService',
            'sensio_framework_extra.view.listener' => 'getSensioFrameworkExtra_View_ListenerService',
            'service_container' => 'getServiceContainerService',
            'session' => 'getSessionService',
            'session.handler' => 'getSession_HandlerService',
            'session.storage.filesystem' => 'getSession_Storage_FilesystemService',
            'session.storage.native' => 'getSession_Storage_NativeService',
            'session.storage.php_bridge' => 'getSession_Storage_PhpBridgeService',
            'session_listener' => 'getSessionListenerService',
            'streamed_response_listener' => 'getStreamedResponseListenerService',
            'swiftmailer.email_sender.listener' => 'getSwiftmailer_EmailSender_ListenerService',
            'swiftmailer.mailer.default' => 'getSwiftmailer_Mailer_DefaultService',
            'swiftmailer.mailer.default.plugin.messagelogger' => 'getSwiftmailer_Mailer_Default_Plugin_MessageloggerService',
            'swiftmailer.mailer.default.spool' => 'getSwiftmailer_Mailer_Default_SpoolService',
            'swiftmailer.mailer.default.transport' => 'getSwiftmailer_Mailer_Default_TransportService',
            'swiftmailer.mailer.default.transport.eventdispatcher' => 'getSwiftmailer_Mailer_Default_Transport_EventdispatcherService',
            'swiftmailer.mailer.default.transport.real' => 'getSwiftmailer_Mailer_Default_Transport_RealService',
            'templating' => 'getTemplatingService',
            'templating.asset.package_factory' => 'getTemplating_Asset_PackageFactoryService',
            'templating.filename_parser' => 'getTemplating_FilenameParserService',
            'templating.globals' => 'getTemplating_GlobalsService',
            'templating.helper.actions' => 'getTemplating_Helper_ActionsService',
            'templating.helper.assets' => 'getTemplating_Helper_AssetsService',
            'templating.helper.code' => 'getTemplating_Helper_CodeService',
            'templating.helper.form' => 'getTemplating_Helper_FormService',
            'templating.helper.logout_url' => 'getTemplating_Helper_LogoutUrlService',
            'templating.helper.request' => 'getTemplating_Helper_RequestService',
            'templating.helper.router' => 'getTemplating_Helper_RouterService',
            'templating.helper.security' => 'getTemplating_Helper_SecurityService',
            'templating.helper.session' => 'getTemplating_Helper_SessionService',
            'templating.helper.slots' => 'getTemplating_Helper_SlotsService',
            'templating.helper.translator' => 'getTemplating_Helper_TranslatorService',
            'templating.loader' => 'getTemplating_LoaderService',
            'templating.locator' => 'getTemplating_LocatorService',
            'templating.name_parser' => 'getTemplating_NameParserService',
            'translation.dumper.csv' => 'getTranslation_Dumper_CsvService',
            'translation.dumper.ini' => 'getTranslation_Dumper_IniService',
            'translation.dumper.mo' => 'getTranslation_Dumper_MoService',
            'translation.dumper.php' => 'getTranslation_Dumper_PhpService',
            'translation.dumper.po' => 'getTranslation_Dumper_PoService',
            'translation.dumper.qt' => 'getTranslation_Dumper_QtService',
            'translation.dumper.res' => 'getTranslation_Dumper_ResService',
            'translation.dumper.xliff' => 'getTranslation_Dumper_XliffService',
            'translation.dumper.yml' => 'getTranslation_Dumper_YmlService',
            'translation.extractor' => 'getTranslation_ExtractorService',
            'translation.extractor.php' => 'getTranslation_Extractor_PhpService',
            'translation.loader' => 'getTranslation_LoaderService',
            'translation.loader.csv' => 'getTranslation_Loader_CsvService',
            'translation.loader.dat' => 'getTranslation_Loader_DatService',
            'translation.loader.ini' => 'getTranslation_Loader_IniService',
            'translation.loader.mo' => 'getTranslation_Loader_MoService',
            'translation.loader.php' => 'getTranslation_Loader_PhpService',
            'translation.loader.po' => 'getTranslation_Loader_PoService',
            'translation.loader.qt' => 'getTranslation_Loader_QtService',
            'translation.loader.res' => 'getTranslation_Loader_ResService',
            'translation.loader.xliff' => 'getTranslation_Loader_XliffService',
            'translation.loader.yml' => 'getTranslation_Loader_YmlService',
            'translation.writer' => 'getTranslation_WriterService',
            'translator' => 'getTranslatorService',
            'translator.default' => 'getTranslator_DefaultService',
            'translator.selector' => 'getTranslator_SelectorService',
            'twig' => 'getTwigService',
            'twig.controller.exception' => 'getTwig_Controller_ExceptionService',
            'twig.exception_listener' => 'getTwig_ExceptionListenerService',
            'twig.extension.mopa.form' => 'getTwig_Extension_Mopa_FormService',
            'twig.loader' => 'getTwig_LoaderService',
            'twig.translation.extractor' => 'getTwig_Translation_ExtractorService',
            'uri_signer' => 'getUriSignerService',
            'validator' => 'getValidatorService',
            'validator.mapping.class_metadata_factory' => 'getValidator_Mapping_ClassMetadataFactoryService',
            'vich_uploader.adapter' => 'getVichUploader_AdapterService',
            'vich_uploader.annotation_driver' => 'getVichUploader_AnnotationDriverService',
            'vich_uploader.file_injector' => 'getVichUploader_FileInjectorService',
            'vich_uploader.namer_uniqid' => 'getVichUploader_NamerUniqidService',
            'vich_uploader.property_mapping_factory' => 'getVichUploader_PropertyMappingFactoryService',
            'vich_uploader.storage' => 'getVichUploader_StorageService',
            'vich_uploader.storage.file_system' => 'getVichUploader_Storage_FileSystemService',
            'vich_uploader.storage.gaufrette' => 'getVichUploader_Storage_GaufretteService',
            'vich_uploader.storage_factory' => 'getVichUploader_StorageFactoryService',
            'vich_uploader.templating.helper.uploader_helper' => 'getVichUploader_Templating_Helper_UploaderHelperService',
            'web_profiler.controller.exception' => 'getWebProfiler_Controller_ExceptionService',
            'web_profiler.controller.profiler' => 'getWebProfiler_Controller_ProfilerService',
            'web_profiler.controller.router' => 'getWebProfiler_Controller_RouterService',
            'web_profiler.debug_toolbar' => 'getWebProfiler_DebugToolbarService',
        );
        $this->aliases = array(
            'database_connection' => 'doctrine.dbal.default_connection',
            'debug.templating.engine.twig' => 'templating',
            'doctrine.orm.entity_manager' => 'doctrine.orm.default_entity_manager',
            'mailer' => 'swiftmailer.mailer.default',
            'sensio.distribution.webconfigurator' => 'sensio_distribution.webconfigurator',
            'serializer' => 'jms_serializer',
            'session.storage' => 'session.storage.native',
            'swiftmailer.mailer' => 'swiftmailer.mailer.default',
            'swiftmailer.plugin.messagelogger' => 'swiftmailer.mailer.default.plugin.messagelogger',
            'swiftmailer.spool' => 'swiftmailer.mailer.default.spool',
            'swiftmailer.transport' => 'swiftmailer.mailer.default.transport',
            'swiftmailer.transport.real' => 'swiftmailer.mailer.default.transport.real',
        );
    }

    /**
     * Gets the 'annotation_reader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\Common\Annotations\FileCacheReader A Doctrine\Common\Annotations\FileCacheReader instance.
     */
    protected function getAnnotationReaderService()
    {
        return $this->services['annotation_reader'] = new \Doctrine\Common\Annotations\FileCacheReader(new \Doctrine\Common\Annotations\AnnotationReader(), '/srv/civix/app/cache/dev/annotations', true);
    }

    /**
     * Gets the 'api.cors' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\ApiBundle\EventListener\CORSSubscriber A Civix\ApiBundle\EventListener\CORSSubscriber instance.
     */
    protected function getApi_CorsService()
    {
        return $this->services['api.cors'] = new \Civix\ApiBundle\EventListener\CORSSubscriber();
    }

    /**
     * Gets the 'assetic.asset_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Assetic\Factory\LazyAssetManager A Assetic\Factory\LazyAssetManager instance.
     */
    protected function getAssetic_AssetManagerService()
    {
        $a = $this->get('templating.loader');

        $this->services['assetic.asset_manager'] = $instance = new \Assetic\Factory\LazyAssetManager($this->get('assetic.asset_factory'), array('twig' => new \Assetic\Factory\Loader\CachedFormulaLoader(new \Assetic\Extension\Twig\TwigFormulaLoader($this->get('twig')), new \Assetic\Cache\ConfigCache('/srv/civix/app/cache/dev/assetic/config'), true)));

        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'FrameworkBundle', '/srv/civix/app/Resources/FrameworkBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'FrameworkBundle', '/srv/civix/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SecurityBundle', '/srv/civix/app/Resources/SecurityBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SecurityBundle', '/srv/civix/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'TwigBundle', '/srv/civix/app/Resources/TwigBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'TwigBundle', '/srv/civix/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'MonologBundle', '/srv/civix/app/Resources/MonologBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'MonologBundle', '/srv/civix/vendor/symfony/monolog-bundle/Symfony/Bundle/MonologBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SwiftmailerBundle', '/srv/civix/app/Resources/SwiftmailerBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SwiftmailerBundle', '/srv/civix/vendor/symfony/swiftmailer-bundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'AsseticBundle', '/srv/civix/app/Resources/AsseticBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'AsseticBundle', '/srv/civix/vendor/symfony/assetic-bundle/Symfony/Bundle/AsseticBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'DoctrineBundle', '/srv/civix/app/Resources/DoctrineBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'DoctrineBundle', '/srv/civix/vendor/doctrine/doctrine-bundle/Doctrine/Bundle/DoctrineBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'DoctrineFixturesBundle', '/srv/civix/app/Resources/DoctrineFixturesBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'DoctrineFixturesBundle', '/srv/civix/vendor/doctrine/doctrine-fixtures-bundle/Doctrine/Bundle/FixturesBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'DoctrineMigrationsBundle', '/srv/civix/app/Resources/DoctrineMigrationsBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'DoctrineMigrationsBundle', '/srv/civix/vendor/doctrine/doctrine-migrations-bundle/Doctrine/Bundle/MigrationsBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SensioFrameworkExtraBundle', '/srv/civix/app/Resources/SensioFrameworkExtraBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SensioFrameworkExtraBundle', '/srv/civix/vendor/sensio/framework-extra-bundle/Sensio/Bundle/FrameworkExtraBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'JMSAopBundle', '/srv/civix/app/Resources/JMSAopBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'JMSAopBundle', '/srv/civix/vendor/jms/aop-bundle/JMS/AopBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'JMSDiExtraBundle', '/srv/civix/app/Resources/JMSDiExtraBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'JMSDiExtraBundle', '/srv/civix/vendor/jms/di-extra-bundle/JMS/DiExtraBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'JMSSecurityExtraBundle', '/srv/civix/app/Resources/JMSSecurityExtraBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'JMSSecurityExtraBundle', '/srv/civix/vendor/jms/security-extra-bundle/JMS/SecurityExtraBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'JMSSerializerBundle', '/srv/civix/app/Resources/JMSSerializerBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'JMSSerializerBundle', '/srv/civix/vendor/jms/serializer-bundle/JMS/SerializerBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'MopaBootstrapBundle', '/srv/civix/app/Resources/MopaBootstrapBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'MopaBootstrapBundle', '/srv/civix/vendor/mopa/bootstrap-bundle/Mopa/Bundle/BootstrapBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'KnpMenuBundle', '/srv/civix/app/Resources/KnpMenuBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'KnpMenuBundle', '/srv/civix/vendor/knplabs/knp-menu-bundle/Knp/Bundle/MenuBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'KnpPaginatorBundle', '/srv/civix/app/Resources/KnpPaginatorBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'KnpPaginatorBundle', '/srv/civix/vendor/knplabs/knp-paginator-bundle/Knp/Bundle/PaginatorBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'EWZRecaptchaBundle', '/srv/civix/app/Resources/EWZRecaptchaBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'EWZRecaptchaBundle', '/srv/civix/vendor/excelwebzone/recaptcha-bundle/EWZ/Bundle/RecaptchaBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'KnpGaufretteBundle', '/srv/civix/app/Resources/KnpGaufretteBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'KnpGaufretteBundle', '/srv/civix/vendor/knplabs/knp-gaufrette-bundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'VichUploaderBundle', '/srv/civix/app/Resources/VichUploaderBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'VichUploaderBundle', '/srv/civix/vendor/vich/uploader-bundle/Vich/UploaderBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'RMSPushNotificationsBundle', '/srv/civix/app/Resources/RMSPushNotificationsBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'RMSPushNotificationsBundle', '/srv/civix/vendor/richsage/rms-push-notifications-bundle/RMS/PushNotificationsBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'OldSoundRabbitMqBundle', '/srv/civix/app/Resources/OldSoundRabbitMqBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'OldSoundRabbitMqBundle', '/srv/civix/vendor/oldsound/rabbitmq-bundle/OldSound/RabbitMqBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CivixFrontBundle', '/srv/civix/app/Resources/CivixFrontBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CivixFrontBundle', '/srv/civix/src/Civix/FrontBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CivixCoreBundle', '/srv/civix/app/Resources/CivixCoreBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CivixCoreBundle', '/srv/civix/src/Civix/CoreBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CivixApiBundle', '/srv/civix/app/Resources/CivixApiBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CivixApiBundle', '/srv/civix/src/Civix/ApiBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CivixBalancedBundle', '/srv/civix/app/Resources/CivixBalancedBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CivixBalancedBundle', '/srv/civix/src/Civix/BalancedBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'WebProfilerBundle', '/srv/civix/app/Resources/WebProfilerBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'WebProfilerBundle', '/srv/civix/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SensioDistributionBundle', '/srv/civix/app/Resources/SensioDistributionBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SensioDistributionBundle', '/srv/civix/vendor/sensio/distribution-bundle/Sensio/Bundle/DistributionBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SensioGeneratorBundle', '/srv/civix/app/Resources/SensioGeneratorBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SensioGeneratorBundle', '/srv/civix/vendor/sensio/generator-bundle/Sensio/Bundle/GeneratorBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'NelmioApiDocBundle', '/srv/civix/app/Resources/NelmioApiDocBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'NelmioApiDocBundle', '/srv/civix/vendor/nelmio/api-doc-bundle/Nelmio/ApiDocBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CivixLoadBundle', '/srv/civix/app/Resources/CivixLoadBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CivixLoadBundle', '/srv/civix/src/Civix/LoadBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, '', '/srv/civix/app/Resources/views', '/\\.[^.]+\\.twig$/'), 'twig');

        return $instance;
    }

    /**
     * Gets the 'assetic.filter.cssrewrite' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Assetic\Filter\CssRewriteFilter A Assetic\Filter\CssRewriteFilter instance.
     */
    protected function getAssetic_Filter_CssrewriteService()
    {
        return $this->services['assetic.filter.cssrewrite'] = new \Assetic\Filter\CssRewriteFilter();
    }

    /**
     * Gets the 'assetic.filter.lessphp' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Assetic\Filter\LessphpFilter A Assetic\Filter\LessphpFilter instance.
     */
    protected function getAssetic_Filter_LessphpService()
    {
        require_once '/srv/civix/app/../vendor/leafo/lessphp/lessc.inc.php';

        $this->services['assetic.filter.lessphp'] = $instance = new \Assetic\Filter\LessphpFilter();

        $instance->setPresets(array());
        $instance->setLoadPaths(array());
        $instance->setFormatter(NULL);
        $instance->setPreserveComments(NULL);

        return $instance;
    }

    /**
     * Gets the 'assetic.filter_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\AsseticBundle\FilterManager A Symfony\Bundle\AsseticBundle\FilterManager instance.
     */
    protected function getAssetic_FilterManagerService()
    {
        return $this->services['assetic.filter_manager'] = new \Symfony\Bundle\AsseticBundle\FilterManager($this, array('lessphp' => 'assetic.filter.lessphp', 'cssrewrite' => 'assetic.filter.cssrewrite'));
    }

    /**
     * Gets the 'aws_s3.client' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Aws\S3\S3Client A Aws\S3\S3Client instance.
     */
    protected function getAwsS3_ClientService()
    {
        return $this->services['aws_s3.client'] = call_user_func(array('Aws\\S3\\S3Client', 'factory'), array('key' => 'AKIAJEQTFQEZC4T4IIZA', 'secret' => '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', 'region' => 'us-east-1'));
    }

    /**
     * Gets the 'aws_ses.client' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Aws\Ses\SesClient A Aws\Ses\SesClient instance.
     */
    protected function getAwsSes_ClientService()
    {
        return $this->services['aws_ses.client'] = call_user_func(array('Aws\\Ses\\SesClient', 'factory'), array('key' => 'AKIAJEQTFQEZC4T4IIZA', 'secret' => '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', 'region' => 'us-east-1'));
    }

    /**
     * Gets the 'aws_sns.client' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Aws\Sns\SnsClient A Aws\Sns\SnsClient instance.
     */
    protected function getAwsSns_ClientService()
    {
        return $this->services['aws_sns.client'] = call_user_func(array('Aws\\Sns\\SnsClient', 'factory'), array('key' => 'AKIAJEQTFQEZC4T4IIZA', 'secret' => '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', 'region' => 'us-east-1'));
    }

    /**
     * Gets the 'cache_clearer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer A Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer instance.
     */
    protected function getCacheClearerService()
    {
        return $this->services['cache_clearer'] = new \Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer(array());
    }

    /**
     * Gets the 'cache_warmer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate A Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate instance.
     */
    protected function getCacheWarmerService()
    {
        $a = $this->get('kernel');
        $b = $this->get('templating.filename_parser');

        $c = new \Symfony\Bundle\FrameworkBundle\CacheWarmer\TemplateFinder($a, $b, '/srv/civix/app/Resources');

        return $this->services['cache_warmer'] = new \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate(array(0 => new \Symfony\Bundle\FrameworkBundle\CacheWarmer\TemplatePathsCacheWarmer($c, $this->get('templating.locator')), 1 => new \Symfony\Bundle\AsseticBundle\CacheWarmer\AssetManagerCacheWarmer($this), 2 => new \Symfony\Bundle\FrameworkBundle\CacheWarmer\RouterCacheWarmer($this->get('router')), 3 => new \Symfony\Bundle\TwigBundle\CacheWarmer\TemplateCacheCacheWarmer($this, $c), 4 => new \Symfony\Bridge\Doctrine\CacheWarmer\ProxyCacheWarmer($this->get('doctrine')), 5 => new \JMS\DiExtraBundle\HttpKernel\ControllerInjectorsWarmer($a, $this->get('jms_di_extra.controller_resolver'), array())));
    }

    /**
     * Gets the 'civix_balanced.payment_calls' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\BalancedBundle\Service\BalancedPaymentCalls A Civix\BalancedBundle\Service\BalancedPaymentCalls instance.
     */
    protected function getCivixBalanced_PaymentCallsService()
    {
        return $this->services['civix_balanced.payment_calls'] = new \Civix\BalancedBundle\Service\BalancedPaymentCalls('ak-test-223c13hVsxbcGMaqCXq3tleHvMCXeXRBR');
    }

    /**
     * Gets the 'civix_balanced.payment_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\BalancedBundle\Service\BalancedPaymentManager A Civix\BalancedBundle\Service\BalancedPaymentManager instance.
     */
    protected function getCivixBalanced_PaymentManagerService()
    {
        return $this->services['civix_balanced.payment_manager'] = new \Civix\BalancedBundle\Service\BalancedPaymentManager($this->get('civix_balanced.payment_calls'), $this->get('logger'), 'Civix\\CoreBundle\\Entity\\Customer\\Customer', 'TEST-MP7ByVfFJSMah8VMM0blIek6', true);
    }

    /**
     * Gets the 'civix_core.account_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\AccountManager A Civix\CoreBundle\Service\AccountManager instance.
     * 
     * @throws InactiveScopeException when the 'civix_core.account_manager' service is requested while the 'request' scope is not active
     */
    protected function getCivixCore_AccountManagerService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_core.account_manager', 'request');
        }

        return $this->services['civix_core.account_manager'] = $this->scopedServices['request']['civix_core.account_manager'] = new \Civix\CoreBundle\Service\AccountManager($this->get('doctrine.orm.default_entity_manager'), $this->get('security.context'), $this->get('session'), $this->get('event_dispatcher'), $this->get('request'));
    }

    /**
     * Gets the 'civix_core.activity_update' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\ActivityUpdate A Civix\CoreBundle\Service\ActivityUpdate instance.
     */
    protected function getCivixCore_ActivityUpdateService()
    {
        return $this->services['civix_core.activity_update'] = new \Civix\CoreBundle\Service\ActivityUpdate($this->get('doctrine.orm.default_entity_manager'), $this->get('civix_core.push_task'), $this->get('validator'), $this->get('civix_core.settings'), $this->get('civix_core.poll.comment_manager'));
    }

    /**
     * Gets the 'civix_core.answer_model_param_converter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Request\ParamConverter\Answer\AnswerModelConverter A Civix\CoreBundle\Request\ParamConverter\Answer\AnswerModelConverter instance.
     */
    protected function getCivixCore_AnswerModelParamConverterService()
    {
        return $this->services['civix_core.answer_model_param_converter'] = new \Civix\CoreBundle\Request\ParamConverter\Answer\AnswerModelConverter($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'civix_core.cicero_api' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\CiceroApi A Civix\CoreBundle\Service\CiceroApi instance.
     */
    protected function getCivixCore_CiceroApiService()
    {
        return $this->services['civix_core.cicero_api'] = new \Civix\CoreBundle\Service\CiceroApi($this->get('civix_core.cicero_calls'), $this->get('logger'), $this->get('doctrine.orm.default_entity_manager'), $this->get('vich_uploader.templating.helper.uploader_helper'), $this->get('civix_core.crop_image'), $this->get('kernel'), $this->get('civix_core.congress_api'), $this->get('civix_core.openstates_api'));
    }

    /**
     * Gets the 'civix_core.cicero_calls' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\CiceroCalls A Civix\CoreBundle\Service\CiceroCalls instance.
     */
    protected function getCivixCore_CiceroCallsService()
    {
        return $this->services['civix_core.cicero_calls'] = new \Civix\CoreBundle\Service\CiceroCalls('ACTL3C', 'First50L3C', $this->get('logger'));
    }

    /**
     * Gets the 'civix_core.comment_model_param_converter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Request\ParamConverter\Comment\CommentModelConverter A Civix\CoreBundle\Request\ParamConverter\Comment\CommentModelConverter instance.
     */
    protected function getCivixCore_CommentModelParamConverterService()
    {
        return $this->services['civix_core.comment_model_param_converter'] = new \Civix\CoreBundle\Request\ParamConverter\Comment\CommentModelConverter();
    }

    /**
     * Gets the 'civix_core.congress_api' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\CongressApi A Civix\CoreBundle\Service\CongressApi instance.
     */
    protected function getCivixCore_CongressApiService()
    {
        return $this->services['civix_core.congress_api'] = new \Civix\CoreBundle\Service\CongressApi('389db47962a64accae30b8948c397a6d');
    }

    /**
     * Gets the 'civix_core.content_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\ContentManager A Civix\CoreBundle\Service\ContentManager instance.
     */
    protected function getCivixCore_ContentManagerService()
    {
        return $this->services['civix_core.content_manager'] = new \Civix\CoreBundle\Service\ContentManager($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'civix_core.crop_avatar' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\CropAvatar A Civix\CoreBundle\Service\CropAvatar instance.
     */
    protected function getCivixCore_CropAvatarService()
    {
        return $this->services['civix_core.crop_avatar'] = new \Civix\CoreBundle\Service\CropAvatar($this->get('civix_core.crop_image'), $this->get('logger'));
    }

    /**
     * Gets the 'civix_core.crop_image' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\CropImage A Civix\CoreBundle\Service\CropImage instance.
     */
    protected function getCivixCore_CropImageService()
    {
        return $this->services['civix_core.crop_image'] = new \Civix\CoreBundle\Service\CropImage();
    }

    /**
     * Gets the 'civix_core.crop_image.form.type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\FrontBundle\Form\Type\CropImage A Civix\FrontBundle\Form\Type\CropImage instance.
     */
    protected function getCivixCore_CropImage_Form_TypeService()
    {
        return $this->services['civix_core.crop_image.form.type'] = new \Civix\FrontBundle\Form\Type\CropImage();
    }

    /**
     * Gets the 'civix_core.customer_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Customer\CustomerManager A Civix\CoreBundle\Service\Customer\CustomerManager instance.
     */
    protected function getCivixCore_CustomerManagerService()
    {
        return $this->services['civix_core.customer_manager'] = new \Civix\CoreBundle\Service\Customer\CustomerManager($this->get('civix_balanced.payment_manager'), $this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'civix_core.deserializer.handler.avatar_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Serializer\Handler\AvatarHandler A Civix\CoreBundle\Serializer\Handler\AvatarHandler instance.
     * 
     * @throws InactiveScopeException when the 'civix_core.deserializer.handler.avatar_handler' service is requested while the 'request' scope is not active
     */
    protected function getCivixCore_Deserializer_Handler_AvatarHandlerService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_core.deserializer.handler.avatar_handler', 'request');
        }

        return $this->services['civix_core.deserializer.handler.avatar_handler'] = $this->scopedServices['request']['civix_core.deserializer.handler.avatar_handler'] = new \Civix\CoreBundle\Serializer\Handler\AvatarHandler($this->get('vich_uploader.templating.helper.uploader_helper'), $this->get('request'), $this->get('monolog.logger.pushsender'));
    }

    /**
     * Gets the 'civix_core.discount_code_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Subscription\DiscountCodeManager A Civix\CoreBundle\Service\Subscription\DiscountCodeManager instance.
     */
    protected function getCivixCore_DiscountCodeManagerService()
    {
        return $this->services['civix_core.discount_code_manager'] = new \Civix\CoreBundle\Service\Subscription\DiscountCodeManager($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'civix_core.editable_avatar.form.type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\FrontBundle\Form\Type\EditableAvatar A Civix\FrontBundle\Form\Type\EditableAvatar instance.
     */
    protected function getCivixCore_EditableAvatar_Form_TypeService()
    {
        return $this->services['civix_core.editable_avatar.form.type'] = new \Civix\FrontBundle\Form\Type\EditableAvatar();
    }

    /**
     * Gets the 'civix_core.email_sender' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\EmailSender A Civix\CoreBundle\Service\EmailSender instance.
     */
    protected function getCivixCore_EmailSenderService()
    {
        return $this->services['civix_core.email_sender'] = new \Civix\CoreBundle\Service\EmailSender($this->get('swiftmailer.mailer.default'), $this->get('templating'), 'support@powerli.ne', 'sergey.sak@intellectsoft.org', 'dev.powerli.ne');
    }

    /**
     * Gets the 'civix_core.facebook_api' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\FacebookApi A Civix\CoreBundle\Service\FacebookApi instance.
     */
    protected function getCivixCore_FacebookApiService()
    {
        return $this->services['civix_core.facebook_api'] = new \Civix\CoreBundle\Service\FacebookApi();
    }

    /**
     * Gets the 'civix_core.geocode' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Google\Geocode A Civix\CoreBundle\Service\Google\Geocode instance.
     */
    protected function getCivixCore_GeocodeService()
    {
        return $this->services['civix_core.geocode'] = new \Civix\CoreBundle\Service\Google\Geocode();
    }

    /**
     * Gets the 'civix_core.group_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Group\GroupManager A Civix\CoreBundle\Service\Group\GroupManager instance.
     */
    protected function getCivixCore_GroupManagerService()
    {
        return $this->services['civix_core.group_manager'] = new \Civix\CoreBundle\Service\Group\GroupManager($this->get('doctrine.orm.default_entity_manager'), $this->get('civix_core.geocode'));
    }

    /**
     * Gets the 'civix_core.invite_sender' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\InviteSender A Civix\CoreBundle\Service\InviteSender instance.
     */
    protected function getCivixCore_InviteSenderService()
    {
        return $this->services['civix_core.invite_sender'] = new \Civix\CoreBundle\Service\InviteSender($this->get('civix_core.email_sender'), $this->get('civix_core.push_task'), $this->get('doctrine.orm.default_entity_manager'), $this->get('civix_core.mailgun'), $this->get('monolog.logger.pushsender'));
    }

    /**
     * Gets the 'civix_core.mailgun' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Mailgun\MailgunApi A Civix\CoreBundle\Service\Mailgun\MailgunApi instance.
     */
    protected function getCivixCore_MailgunService()
    {
        return $this->services['civix_core.mailgun'] = new \Civix\CoreBundle\Service\Mailgun\MailgunApi('pubkey-d74e021acaeaf1ca97949c8a16899e93', 'key-de1771b1c0056a4895cccd34f425ffe7', $this);
    }

    /**
     * Gets the 'civix_core.notification' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Notification A Civix\CoreBundle\Service\Notification instance.
     */
    protected function getCivixCore_NotificationService()
    {
        return $this->services['civix_core.notification'] = new \Civix\CoreBundle\Service\Notification($this->get('doctrine.orm.default_entity_manager'), $this->get('aws_sns.client'), 'arn:aws:sns:us-east-1:863632456175:app/GCM/powerline_android_staging', 'arn:aws:sns:us-east-1:863632456175:app/APNS/powerline_ios_staging');
    }

    /**
     * Gets the 'civix_core.openstates_api' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\OpenstatesApi A Civix\CoreBundle\Service\OpenstatesApi instance.
     */
    protected function getCivixCore_OpenstatesApiService()
    {
        return $this->services['civix_core.openstates_api'] = new \Civix\CoreBundle\Service\OpenstatesApi('389db47962a64accae30b8948c397a6d');
    }

    /**
     * Gets the 'civix_core.orders_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Customer\OrdersManager A Civix\CoreBundle\Service\Customer\OrdersManager instance.
     */
    protected function getCivixCore_OrdersManagerService()
    {
        return $this->services['civix_core.orders_manager'] = new \Civix\CoreBundle\Service\Customer\OrdersManager($this->get('civix_balanced.payment_calls'), $this->get('civix_core.customer_manager'), $this->get('doctrine.orm.default_entity_manager'), $this->get('civix_core.email_sender'));
    }

    /**
     * Gets the 'civix_core.package_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Subscription\PackageHandler A Civix\CoreBundle\Service\Subscription\PackageHandler instance.
     */
    protected function getCivixCore_PackageHandlerService()
    {
        return $this->services['civix_core.package_handler'] = new \Civix\CoreBundle\Service\Subscription\PackageHandler($this->get('doctrine.orm.default_entity_manager'), $this->get('civix_core.subscription_manager'));
    }

    /**
     * Gets the 'civix_core.payments' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Payments\BalancedPayment A Civix\CoreBundle\Service\Payments\BalancedPayment instance.
     */
    protected function getCivixCore_PaymentsService()
    {
        return $this->services['civix_core.payments'] = new \Civix\CoreBundle\Service\Payments\BalancedPayment($this->get('civix_balanced.payment_manager'), $this->get('doctrine.orm.default_entity_manager'), 'TEST-MP7ByVfFJSMah8VMM0blIek6');
    }

    /**
     * Gets the 'civix_core.payments_transaction_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Payments\TransactionManager A Civix\CoreBundle\Service\Payments\TransactionManager instance.
     */
    protected function getCivixCore_PaymentsTransactionManagerService()
    {
        return $this->services['civix_core.payments_transaction_manager'] = new \Civix\CoreBundle\Service\Payments\TransactionManager($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'civix_core.poll.answer_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Poll\AnswerManager A Civix\CoreBundle\Service\Poll\AnswerManager instance.
     */
    protected function getCivixCore_Poll_AnswerManagerService()
    {
        return $this->services['civix_core.poll.answer_manager'] = new \Civix\CoreBundle\Service\Poll\AnswerManager($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'civix_core.poll.comment_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Poll\CommentManager A Civix\CoreBundle\Service\Poll\CommentManager instance.
     */
    protected function getCivixCore_Poll_CommentManagerService()
    {
        return $this->services['civix_core.poll.comment_manager'] = new \Civix\CoreBundle\Service\Poll\CommentManager($this->get('doctrine.orm.default_entity_manager'), $this->get('civix_core.content_manager'), $this->get('civix_core.social_activity_manager'));
    }

    /**
     * Gets the 'civix_core.poll.micropetition_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Micropetitions\PetitionManager A Civix\CoreBundle\Service\Micropetitions\PetitionManager instance.
     */
    protected function getCivixCore_Poll_MicropetitionManagerService()
    {
        return $this->services['civix_core.poll.micropetition_manager'] = new \Civix\CoreBundle\Service\Micropetitions\PetitionManager($this->get('doctrine.orm.default_entity_manager'), $this->get('civix_core.activity_update'));
    }

    /**
     * Gets the 'civix_core.push_sender' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\PushSender A Civix\CoreBundle\Service\PushSender instance.
     */
    protected function getCivixCore_PushSenderService()
    {
        return $this->services['civix_core.push_sender'] = new \Civix\CoreBundle\Service\PushSender($this->get('doctrine.orm.default_entity_manager'), $this->get('civix_core.question_users_push'), $this->get('civix_core.notification'), $this->get('civix_core.s3client_api'), $this->get('monolog.logger.pushsender'));
    }

    /**
     * Gets the 'civix_core.push_task' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\PushTask A Civix\CoreBundle\Service\PushTask instance.
     */
    protected function getCivixCore_PushTaskService()
    {
        return $this->services['civix_core.push_task'] = new \Civix\CoreBundle\Service\PushTask($this->get('old_sound_rabbit_mq.push_queue_producer'), $this->get('monolog.logger.pushsender'));
    }

    /**
     * Gets the 'civix_core.question_limit' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\QuestionLimit A Civix\CoreBundle\Service\QuestionLimit instance.
     */
    protected function getCivixCore_QuestionLimitService()
    {
        return $this->services['civix_core.question_limit'] = new \Civix\CoreBundle\Service\QuestionLimit($this->get('doctrine.orm.default_entity_manager'), $this->get('session'));
    }

    /**
     * Gets the 'civix_core.question_users_push' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Poll\QuestionUserPush A Civix\CoreBundle\Service\Poll\QuestionUserPush instance.
     */
    protected function getCivixCore_QuestionUsersPushService()
    {
        return $this->services['civix_core.question_users_push'] = new \Civix\CoreBundle\Service\Poll\QuestionUserPush($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'civix_core.queue_task' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\QueueTask A Civix\CoreBundle\Service\QueueTask instance.
     */
    protected function getCivixCore_QueueTaskService()
    {
        return $this->services['civix_core.queue_task'] = new \Civix\CoreBundle\Service\QueueTask($this->get('old_sound_rabbit_mq.push_queue_producer'), $this->get('monolog.logger.pushsender'));
    }

    /**
     * Gets the 'civix_core.rabbit.push_queue' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\RabbitMQCallback\PushQueue A Civix\CoreBundle\Service\RabbitMQCallback\PushQueue instance.
     */
    protected function getCivixCore_Rabbit_PushQueueService()
    {
        return $this->services['civix_core.rabbit.push_queue'] = new \Civix\CoreBundle\Service\RabbitMQCallback\PushQueue($this->get('civix_core.push_sender'), $this->get('civix_core.representative_storage_manager'), $this->get('monolog.logger.pushsender'));
    }

    /**
     * Gets the 'civix_core.rabbit.push_test' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\RabbitMQCallback\PushTest A Civix\CoreBundle\Service\RabbitMQCallback\PushTest instance.
     */
    protected function getCivixCore_Rabbit_PushTestService()
    {
        return $this->services['civix_core.rabbit.push_test'] = new \Civix\CoreBundle\Service\RabbitMQCallback\PushTest($this->get('civix_core.push_sender'), $this->get('monolog.logger.pushsender'));
    }

    /**
     * Gets the 'civix_core.representative_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Representative\RepresentativeManager A Civix\CoreBundle\Service\Representative\RepresentativeManager instance.
     */
    protected function getCivixCore_RepresentativeManagerService()
    {
        return $this->services['civix_core.representative_manager'] = new \Civix\CoreBundle\Service\Representative\RepresentativeManager($this->get('doctrine.orm.default_entity_manager'), $this->get('security.encoder_factory'), $this->get('civix_core.cicero_api'));
    }

    /**
     * Gets the 'civix_core.representative_storage_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Representative\RepresentativeSTManager A Civix\CoreBundle\Service\Representative\RepresentativeSTManager instance.
     */
    protected function getCivixCore_RepresentativeStorageManagerService()
    {
        return $this->services['civix_core.representative_storage_manager'] = new \Civix\CoreBundle\Service\Representative\RepresentativeSTManager($this->get('doctrine.orm.default_entity_manager'), $this->get('civix_core.cicero_api'), $this->get('civix_core.cicero_calls'));
    }

    /**
     * Gets the 'civix_core.s3client_api' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\S3clientApi A Civix\CoreBundle\Service\S3clientApi instance.
     */
    protected function getCivixCore_S3clientApiService()
    {
        return $this->services['civix_core.s3client_api'] = new \Civix\CoreBundle\Service\S3clientApi($this->get('aws_s3.client'), 'stagingpowerline', $this->get('monolog.logger.pushsender'));
    }

    /**
     * Gets the 'civix_core.serializer.handler.avatar_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Serializer\Handler\AvatarHandler A Civix\CoreBundle\Serializer\Handler\AvatarHandler instance.
     * 
     * @throws InactiveScopeException when the 'civix_core.serializer.handler.avatar_handler' service is requested while the 'request' scope is not active
     */
    protected function getCivixCore_Serializer_Handler_AvatarHandlerService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_core.serializer.handler.avatar_handler', 'request');
        }

        return $this->services['civix_core.serializer.handler.avatar_handler'] = $this->scopedServices['request']['civix_core.serializer.handler.avatar_handler'] = new \Civix\CoreBundle\Serializer\Handler\AvatarHandler($this->get('vich_uploader.templating.helper.uploader_helper'), $this->get('request'));
    }

    /**
     * Gets the 'civix_core.serializer.handler.image_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Serializer\Handler\ImageHandler A Civix\CoreBundle\Serializer\Handler\ImageHandler instance.
     * 
     * @throws InactiveScopeException when the 'civix_core.serializer.handler.image_handler' service is requested while the 'request' scope is not active
     */
    protected function getCivixCore_Serializer_Handler_ImageHandlerService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_core.serializer.handler.image_handler', 'request');
        }

        return $this->services['civix_core.serializer.handler.image_handler'] = $this->scopedServices['request']['civix_core.serializer.handler.image_handler'] = new \Civix\CoreBundle\Serializer\Handler\ImageHandler($this->get('vich_uploader.templating.helper.uploader_helper'), $this->get('request'));
    }

    /**
     * Gets the 'civix_core.serializer.handler.join_status_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Serializer\Handler\JoinStatusHandler A Civix\CoreBundle\Serializer\Handler\JoinStatusHandler instance.
     */
    protected function getCivixCore_Serializer_Handler_JoinStatusHandlerService()
    {
        return $this->services['civix_core.serializer.handler.join_status_handler'] = new \Civix\CoreBundle\Serializer\Handler\JoinStatusHandler($this->get('security.context'));
    }

    /**
     * Gets the 'civix_core.serializer.handler.owner_data_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Serializer\Handler\OwnerDataHandler A Civix\CoreBundle\Serializer\Handler\OwnerDataHandler instance.
     * 
     * @throws InactiveScopeException when the 'civix_core.serializer.handler.owner_data_handler' service is requested while the 'request' scope is not active
     */
    protected function getCivixCore_Serializer_Handler_OwnerDataHandlerService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_core.serializer.handler.owner_data_handler', 'request');
        }

        return $this->services['civix_core.serializer.handler.owner_data_handler'] = $this->scopedServices['request']['civix_core.serializer.handler.owner_data_handler'] = new \Civix\CoreBundle\Serializer\Handler\OwnerDataHandler($this->get('vich_uploader.templating.helper.uploader_helper'), $this->get('request'));
    }

    /**
     * Gets the 'civix_core.settings' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Settings A Civix\CoreBundle\Service\Settings instance.
     */
    protected function getCivixCore_SettingsService()
    {
        return $this->services['civix_core.settings'] = new \Civix\CoreBundle\Service\Settings($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'civix_core.social_activity_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\SocialActivityManager A Civix\CoreBundle\Service\SocialActivityManager instance.
     */
    protected function getCivixCore_SocialActivityManagerService()
    {
        return $this->services['civix_core.social_activity_manager'] = new \Civix\CoreBundle\Service\SocialActivityManager($this->get('doctrine.orm.default_entity_manager'), $this->get('civix_core.push_task'));
    }

    /**
     * Gets the 'civix_core.stripe' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Stripe A Civix\CoreBundle\Service\Stripe instance.
     */
    protected function getCivixCore_StripeService()
    {
        return $this->services['civix_core.stripe'] = new \Civix\CoreBundle\Service\Stripe('sk_live_3ysnRoVv7bbCHtxrRPvNUrQg', $this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'civix_core.subscription_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\Subscription\SubscriptionManager A Civix\CoreBundle\Service\Subscription\SubscriptionManager instance.
     */
    protected function getCivixCore_SubscriptionManagerService()
    {
        return $this->services['civix_core.subscription_manager'] = new \Civix\CoreBundle\Service\Subscription\SubscriptionManager($this->get('doctrine.orm.default_entity_manager'), $this->get('civix_core.stripe'), $this->get('civix_core.email_sender'), $this->get('civix_core.discount_code_manager'));
    }

    /**
     * Gets the 'civix_core.user_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Service\User\UserManager A Civix\CoreBundle\Service\User\UserManager instance.
     */
    protected function getCivixCore_UserManagerService()
    {
        return $this->services['civix_core.user_manager'] = new \Civix\CoreBundle\Service\User\UserManager($this->get('doctrine.orm.default_entity_manager'), $this->get('civix_core.cicero_api'), $this->get('civix_core.group_manager'), $this->get('civix_core.crop_image'), '/srv/civix/app');
    }

    /**
     * Gets the 'civix_core.validator.facebook_token' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Validator\Constrains\ConstrainsFacebookTokenValidator A Civix\CoreBundle\Validator\Constrains\ConstrainsFacebookTokenValidator instance.
     */
    protected function getCivixCore_Validator_FacebookTokenService()
    {
        return $this->services['civix_core.validator.facebook_token'] = new \Civix\CoreBundle\Validator\Constrains\ConstrainsFacebookTokenValidator($this->get('civix_core.facebook_api'));
    }

    /**
     * Gets the 'civix_core.validator.not_joined_to_group' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\CoreBundle\Validator\Constrains\NotJoinedToGroupValidator A Civix\CoreBundle\Validator\Constrains\NotJoinedToGroupValidator instance.
     */
    protected function getCivixCore_Validator_NotJoinedToGroupService()
    {
        return $this->services['civix_core.validator.not_joined_to_group'] = new \Civix\CoreBundle\Validator\Constrains\NotJoinedToGroupValidator($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'civix_front.form.representative.question' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\FrontBundle\Form\Type\Poll\Representative\RepresentativeQuestion A Civix\FrontBundle\Form\Type\Poll\Representative\RepresentativeQuestion instance.
     */
    protected function getCivixFront_Form_Representative_QuestionService()
    {
        return $this->services['civix_front.form.representative.question'] = new \Civix\FrontBundle\Form\Type\Poll\Representative\RepresentativeQuestion('doctrine');
    }

    /**
     * Gets the 'civix_front.group_members' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar A Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar instance.
     * 
     * @throws InactiveScopeException when the 'civix_front.group_members' service is requested while the 'request' scope is not active
     */
    protected function getCivixFront_GroupMembersService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_front.group_members', 'request');
        }

        return $this->services['civix_front.group_members'] = $this->scopedServices['request']['civix_front.group_members'] = new \Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar(array('menu' => $this->get('civix_front.navbar_group_members_menu')), array(), array());
    }

    /**
     * Gets the 'civix_front.manage' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar A Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar instance.
     * 
     * @throws InactiveScopeException when the 'civix_front.manage' service is requested while the 'request' scope is not active
     */
    protected function getCivixFront_ManageService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_front.manage', 'request');
        }

        return $this->services['civix_front.manage'] = $this->scopedServices['request']['civix_front.manage'] = new \Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar(array('menu' => $this->get('civix_front.navbar_manage_menu')), array(), array());
    }

    /**
     * Gets the 'civix_front.micro_petition' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar A Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar instance.
     * 
     * @throws InactiveScopeException when the 'civix_front.micro_petition' service is requested while the 'request' scope is not active
     */
    protected function getCivixFront_MicroPetitionService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_front.micro_petition', 'request');
        }

        return $this->services['civix_front.micro_petition'] = $this->scopedServices['request']['civix_front.micro_petition'] = new \Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar(array('menu' => $this->get('civix_front.navbar_micro_petition_menu')), array(), array());
    }

    /**
     * Gets the 'civix_front.navbar' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar A Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar instance.
     * 
     * @throws InactiveScopeException when the 'civix_front.navbar' service is requested while the 'request' scope is not active
     */
    protected function getCivixFront_NavbarService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_front.navbar', 'request');
        }

        return $this->services['civix_front.navbar'] = $this->scopedServices['request']['civix_front.navbar'] = new \Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar(array('leftmenu' => $this->get('civix_front.navbar_main_menu')), array(), array());
    }

    /**
     * Gets the 'civix_front.navbar_group_members_menu' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Menu\MenuItem A Knp\Menu\MenuItem instance.
     * 
     * @throws InactiveScopeException when the 'civix_front.navbar_group_members_menu' service is requested while the 'request' scope is not active
     */
    protected function getCivixFront_NavbarGroupMembersMenuService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_front.navbar_group_members_menu', 'request');
        }

        return $this->services['civix_front.navbar_group_members_menu'] = $this->scopedServices['request']['civix_front.navbar_group_members_menu'] = $this->get('civix_front.navbar_menu_builder')->createGroupUserMenu($this->get('request'));
    }

    /**
     * Gets the 'civix_front.navbar_main_menu' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Menu\MenuItem A Knp\Menu\MenuItem instance.
     * 
     * @throws InactiveScopeException when the 'civix_front.navbar_main_menu' service is requested while the 'request' scope is not active
     */
    protected function getCivixFront_NavbarMainMenuService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_front.navbar_main_menu', 'request');
        }

        return $this->services['civix_front.navbar_main_menu'] = $this->scopedServices['request']['civix_front.navbar_main_menu'] = $this->get('civix_front.navbar_menu_builder')->createMainMenu($this->get('request'));
    }

    /**
     * Gets the 'civix_front.navbar_manage_menu' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Menu\MenuItem A Knp\Menu\MenuItem instance.
     * 
     * @throws InactiveScopeException when the 'civix_front.navbar_manage_menu' service is requested while the 'request' scope is not active
     */
    protected function getCivixFront_NavbarManageMenuService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_front.navbar_manage_menu', 'request');
        }

        return $this->services['civix_front.navbar_manage_menu'] = $this->scopedServices['request']['civix_front.navbar_manage_menu'] = $this->get('civix_front.navbar_menu_builder')->createManageMenu($this->get('request'));
    }

    /**
     * Gets the 'civix_front.navbar_menu_builder' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\FrontBundle\Menu\MenuBuilder A Civix\FrontBundle\Menu\MenuBuilder instance.
     * 
     * @throws InactiveScopeException when the 'civix_front.navbar_menu_builder' service is requested while the 'request' scope is not active
     */
    protected function getCivixFront_NavbarMenuBuilderService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_front.navbar_menu_builder', 'request');
        }

        return $this->services['civix_front.navbar_menu_builder'] = $this->scopedServices['request']['civix_front.navbar_menu_builder'] = new \Civix\FrontBundle\Menu\MenuBuilder($this->get('knp_menu.factory'), $this->get('security.context'));
    }

    /**
     * Gets the 'civix_front.navbar_micro_petition_menu' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Menu\MenuItem A Knp\Menu\MenuItem instance.
     * 
     * @throws InactiveScopeException when the 'civix_front.navbar_micro_petition_menu' service is requested while the 'request' scope is not active
     */
    protected function getCivixFront_NavbarMicroPetitionMenuService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_front.navbar_micro_petition_menu', 'request');
        }

        return $this->services['civix_front.navbar_micro_petition_menu'] = $this->scopedServices['request']['civix_front.navbar_micro_petition_menu'] = $this->get('civix_front.navbar_menu_builder')->createMicroPetitionMenu($this->get('request'));
    }

    /**
     * Gets the 'civix_front.navbar_petition_menu' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Menu\MenuItem A Knp\Menu\MenuItem instance.
     * 
     * @throws InactiveScopeException when the 'civix_front.navbar_petition_menu' service is requested while the 'request' scope is not active
     */
    protected function getCivixFront_NavbarPetitionMenuService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_front.navbar_petition_menu', 'request');
        }

        return $this->services['civix_front.navbar_petition_menu'] = $this->scopedServices['request']['civix_front.navbar_petition_menu'] = $this->get('civix_front.navbar_menu_builder')->createPetitionMenu($this->get('request'));
    }

    /**
     * Gets the 'civix_front.navbar_question_menu' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Menu\MenuItem A Knp\Menu\MenuItem instance.
     * 
     * @throws InactiveScopeException when the 'civix_front.navbar_question_menu' service is requested while the 'request' scope is not active
     */
    protected function getCivixFront_NavbarQuestionMenuService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_front.navbar_question_menu', 'request');
        }

        return $this->services['civix_front.navbar_question_menu'] = $this->scopedServices['request']['civix_front.navbar_question_menu'] = $this->get('civix_front.navbar_menu_builder')->createQuestionMenu($this->get('request'));
    }

    /**
     * Gets the 'civix_front.navbar_question_options' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Menu\MenuItem A Knp\Menu\MenuItem instance.
     * 
     * @throws InactiveScopeException when the 'civix_front.navbar_question_options' service is requested while the 'request' scope is not active
     */
    protected function getCivixFront_NavbarQuestionOptionsService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_front.navbar_question_options', 'request');
        }

        return $this->services['civix_front.navbar_question_options'] = $this->scopedServices['request']['civix_front.navbar_question_options'] = $this->get('civix_front.navbar_menu_builder')->createQuestionOptions($this->get('request'));
    }

    /**
     * Gets the 'civix_front.navbar_settings_menu' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Menu\MenuItem A Knp\Menu\MenuItem instance.
     * 
     * @throws InactiveScopeException when the 'civix_front.navbar_settings_menu' service is requested while the 'request' scope is not active
     */
    protected function getCivixFront_NavbarSettingsMenuService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_front.navbar_settings_menu', 'request');
        }

        return $this->services['civix_front.navbar_settings_menu'] = $this->scopedServices['request']['civix_front.navbar_settings_menu'] = $this->get('civix_front.navbar_menu_builder')->createSettingsMenu($this->get('request'));
    }

    /**
     * Gets the 'civix_front.petition' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar A Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar instance.
     * 
     * @throws InactiveScopeException when the 'civix_front.petition' service is requested while the 'request' scope is not active
     */
    protected function getCivixFront_PetitionService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_front.petition', 'request');
        }

        return $this->services['civix_front.petition'] = $this->scopedServices['request']['civix_front.petition'] = new \Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar(array('menu' => $this->get('civix_front.navbar_petition_menu')), array(), array());
    }

    /**
     * Gets the 'civix_front.question' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar A Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar instance.
     * 
     * @throws InactiveScopeException when the 'civix_front.question' service is requested while the 'request' scope is not active
     */
    protected function getCivixFront_QuestionService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_front.question', 'request');
        }

        return $this->services['civix_front.question'] = $this->scopedServices['request']['civix_front.question'] = new \Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar(array('menu' => $this->get('civix_front.navbar_question_menu'), 'options' => $this->get('civix_front.navbar_question_options')), array(), array());
    }

    /**
     * Gets the 'civix_front.settings' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar A Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar instance.
     * 
     * @throws InactiveScopeException when the 'civix_front.settings' service is requested while the 'request' scope is not active
     */
    protected function getCivixFront_SettingsService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('civix_front.settings', 'request');
        }

        return $this->services['civix_front.settings'] = $this->scopedServices['request']['civix_front.settings'] = new \Mopa\Bundle\BootstrapBundle\Navbar\GenericNavbar(array('menu' => $this->get('civix_front.navbar_settings_menu')), array(), array());
    }

    /**
     * Gets the 'civix_load.generator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Civix\LoadBundle\Service\Generator A Civix\LoadBundle\Service\Generator instance.
     */
    protected function getCivixLoad_GeneratorService()
    {
        return $this->services['civix_load.generator'] = new \Civix\LoadBundle\Service\Generator($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'data_collector.request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\DataCollector\RequestDataCollector A Symfony\Component\HttpKernel\DataCollector\RequestDataCollector instance.
     */
    protected function getDataCollector_RequestService()
    {
        return $this->services['data_collector.request'] = new \Symfony\Component\HttpKernel\DataCollector\RequestDataCollector();
    }

    /**
     * Gets the 'data_collector.router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector A Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector instance.
     */
    protected function getDataCollector_RouterService()
    {
        return $this->services['data_collector.router'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector();
    }

    /**
     * Gets the 'debug.controller_resolver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Controller\TraceableControllerResolver A Symfony\Component\HttpKernel\Controller\TraceableControllerResolver instance.
     */
    protected function getDebug_ControllerResolverService()
    {
        return $this->services['debug.controller_resolver'] = new \Symfony\Component\HttpKernel\Controller\TraceableControllerResolver($this->get('jms_di_extra.controller_resolver'), $this->get('debug.stopwatch'));
    }

    /**
     * Gets the 'debug.deprecation_logger_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ErrorsLoggerListener A Symfony\Component\HttpKernel\EventListener\ErrorsLoggerListener instance.
     */
    protected function getDebug_DeprecationLoggerListenerService()
    {
        return $this->services['debug.deprecation_logger_listener'] = new \Symfony\Component\HttpKernel\EventListener\ErrorsLoggerListener('deprecation', $this->get('monolog.logger.deprecation', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'debug.emergency_logger_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ErrorsLoggerListener A Symfony\Component\HttpKernel\EventListener\ErrorsLoggerListener instance.
     */
    protected function getDebug_EmergencyLoggerListenerService()
    {
        return $this->services['debug.emergency_logger_listener'] = new \Symfony\Component\HttpKernel\EventListener\ErrorsLoggerListener('emergency', $this->get('monolog.logger.emergency', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'debug.event_dispatcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher A Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher instance.
     */
    protected function getDebug_EventDispatcherService()
    {
        $this->services['debug.event_dispatcher'] = $instance = new \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher($this->get('event_dispatcher'), $this->get('debug.stopwatch'), $this->get('monolog.logger.event', ContainerInterface::NULL_ON_INVALID_REFERENCE));

        $instance->setProfiler($this->get('profiler', ContainerInterface::NULL_ON_INVALID_REFERENCE));

        return $instance;
    }

    /**
     * Gets the 'debug.stopwatch' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Stopwatch\Stopwatch A Symfony\Component\Stopwatch\Stopwatch instance.
     */
    protected function getDebug_StopwatchService()
    {
        return $this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch();
    }

    /**
     * Gets the 'debug.templating.engine.php' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\TimedPhpEngine A Symfony\Bundle\FrameworkBundle\Templating\TimedPhpEngine instance.
     */
    protected function getDebug_Templating_Engine_PhpService()
    {
        $this->services['debug.templating.engine.php'] = $instance = new \Symfony\Bundle\FrameworkBundle\Templating\TimedPhpEngine($this->get('templating.name_parser'), $this, $this->get('templating.loader'), $this->get('debug.stopwatch'), $this->get('templating.globals'));

        $instance->setCharset('UTF-8');
        $instance->setHelpers(array('slots' => 'templating.helper.slots', 'assets' => 'templating.helper.assets', 'request' => 'templating.helper.request', 'session' => 'templating.helper.session', 'router' => 'templating.helper.router', 'actions' => 'templating.helper.actions', 'code' => 'templating.helper.code', 'translator' => 'templating.helper.translator', 'form' => 'templating.helper.form', 'logout_url' => 'templating.helper.logout_url', 'security' => 'templating.helper.security', 'assetic' => 'assetic.helper.static', 'jms_serializer' => 'jms_serializer.templating.helper.serializer', 'knp_pagination' => 'knp_paginator.templating.helper.pagination', 'vich_uploader' => 'vich_uploader.templating.helper.uploader_helper'));

        return $instance;
    }

    /**
     * Gets the 'doctrine' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Registry A Doctrine\Bundle\DoctrineBundle\Registry instance.
     */
    protected function getDoctrineService()
    {
        return $this->services['doctrine'] = new \Doctrine\Bundle\DoctrineBundle\Registry($this, array('default' => 'doctrine.dbal.default_connection'), array('default' => 'doctrine.orm.default_entity_manager'), 'default', 'default');
    }

    /**
     * Gets the 'doctrine.dbal.connection_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\ConnectionFactory A Doctrine\Bundle\DoctrineBundle\ConnectionFactory instance.
     */
    protected function getDoctrine_Dbal_ConnectionFactoryService()
    {
        return $this->services['doctrine.dbal.connection_factory'] = new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory(array());
    }

    /**
     * Gets the 'doctrine.dbal.default_connection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \stdClass A stdClass instance.
     */
    protected function getDoctrine_Dbal_DefaultConnectionService()
    {
        $a = new \Doctrine\DBAL\Logging\LoggerChain();
        $a->addLogger(new \Symfony\Bridge\Doctrine\Logger\DbalLogger($this->get('monolog.logger.doctrine', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('debug.stopwatch', ContainerInterface::NULL_ON_INVALID_REFERENCE)));
        $a->addLogger($this->get('doctrine.dbal.logger.profiling.default'));

        $b = new \Doctrine\DBAL\Configuration();
        $b->setSQLLogger($a);

        $c = new \Doctrine\ORM\Tools\ResolveTargetEntityListener();
        $c->addResolveTargetEntity('Civix\\BalancedBundle\\Model\\BalancedUserInterface', 'Civix\\CoreBundle\\Entity\\Customer\\Customer', array());

        $d = new \Symfony\Bridge\Doctrine\ContainerAwareEventManager($this);
        $d->addEventSubscriber(new \Vich\UploaderBundle\EventListener\UploaderListener($this->get('vich_uploader.adapter'), $this->get('vich_uploader.annotation_driver'), $this->get('vich_uploader.storage'), $this->get('vich_uploader.file_injector')));
        $d->addEventListener(array(0 => 'loadClassMetadata'), $c);

        return $this->services['doctrine.dbal.default_connection'] = $this->get('doctrine.dbal.connection_factory')->createConnection(array('driver' => 'pdo_mysql', 'host' => 'civixdevdb.c5ywiczyhtjr.us-east-1.rds.amazonaws.com', 'port' => NULL, 'dbname' => 'civixdevdb', 'user' => 'civixdevdb', 'password' => 'civixdevdb', 'charset' => 'UTF8', 'driverOptions' => array()), $b, $d, array());
    }

    /**
     * Gets the 'doctrine.orm.default_entity_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \EntityManager56902dad9f9ff_546a8d27f194334ee012bfe64f629947b07e4919\__CG__\Doctrine\ORM\EntityManager A EntityManager56902dad9f9ff_546a8d27f194334ee012bfe64f629947b07e4919\__CG__\Doctrine\ORM\EntityManager instance.
     */
    protected function getDoctrine_Orm_DefaultEntityManagerService()
    {
        require_once '/srv/civix/app/cache/dev/jms_diextra/doctrine/EntityManager_56902dad9f9ff.php';

        $a = $this->get('annotation_reader');

        $b = new \Doctrine\Common\Cache\ArrayCache();
        $b->setNamespace('sf2orm_default_c1ac33cb0a61d932286859000f66f098');

        $c = new \Doctrine\Common\Cache\ArrayCache();
        $c->setNamespace('sf2orm_default_c1ac33cb0a61d932286859000f66f098');

        $d = new \Doctrine\Common\Cache\ArrayCache();
        $d->setNamespace('sf2orm_default_c1ac33cb0a61d932286859000f66f098');

        $e = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($a, array(0 => '/srv/civix/src/Civix/CoreBundle/Entity', 1 => '/srv/civix/src/Civix/BalancedBundle/Entity'));

        $f = new \Doctrine\ORM\Mapping\Driver\DriverChain();
        $f->addDriver($e, 'Civix\\CoreBundle\\Entity');
        $f->addDriver($e, 'Civix\\BalancedBundle\\Entity');

        $g = new \Doctrine\ORM\Configuration();
        $g->setEntityNamespaces(array('CivixCoreBundle' => 'Civix\\CoreBundle\\Entity', 'CivixBalancedBundle' => 'Civix\\BalancedBundle\\Entity'));
        $g->setMetadataCacheImpl($b);
        $g->setQueryCacheImpl($c);
        $g->setResultCacheImpl($d);
        $g->setMetadataDriverImpl($f);
        $g->setProxyDir('/srv/civix/app/cache/dev/doctrine/orm/Proxies');
        $g->setProxyNamespace('Proxies');
        $g->setAutoGenerateProxyClasses(true);
        $g->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');
        $g->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
        $g->setNamingStrategy(new \Doctrine\ORM\Mapping\DefaultNamingStrategy());

        $h = call_user_func(array('Doctrine\\ORM\\EntityManager', 'create'), $this->get('doctrine.dbal.default_connection'), $g);
        $this->get('doctrine.orm.default_manager_configurator')->configure($h);

        return $this->services['doctrine.orm.default_entity_manager'] = new \EntityManager56902dad9f9ff_546a8d27f194334ee012bfe64f629947b07e4919\__CG__\Doctrine\ORM\EntityManager($h, $this);
    }

    /**
     * Gets the 'doctrine.orm.default_manager_configurator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator A Doctrine\Bundle\DoctrineBundle\ManagerConfigurator instance.
     */
    protected function getDoctrine_Orm_DefaultManagerConfiguratorService()
    {
        return $this->services['doctrine.orm.default_manager_configurator'] = new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator(array(), array());
    }

    /**
     * Gets the 'doctrine.orm.validator.unique' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator A Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator instance.
     */
    protected function getDoctrine_Orm_Validator_UniqueService()
    {
        return $this->services['doctrine.orm.validator.unique'] = new \Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator($this->get('doctrine'));
    }

    /**
     * Gets the 'doctrine.orm.validator_initializer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Doctrine\Validator\DoctrineInitializer A Symfony\Bridge\Doctrine\Validator\DoctrineInitializer instance.
     */
    protected function getDoctrine_Orm_ValidatorInitializerService()
    {
        return $this->services['doctrine.orm.validator_initializer'] = new \Symfony\Bridge\Doctrine\Validator\DoctrineInitializer($this->get('doctrine'));
    }

    /**
     * Gets the 'event_dispatcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher A Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher instance.
     */
    protected function getEventDispatcherService()
    {
        $this->services['event_dispatcher'] = $instance = new \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher($this);

        $instance->addListenerService('knp_pager.before', array(0 => 'knp_paginator.subscriber.paginate', 1 => 'before'), 0);
        $instance->addListenerService('knp_pager.pagination', array(0 => 'knp_paginator.subscriber.paginate', 1 => 'pagination'), 0);
        $instance->addListenerService('knp_pager.before', array(0 => 'knp_paginator.subscriber.sortable', 1 => 'before'), 1);
        $instance->addListenerService('knp_pager.before', array(0 => 'knp_paginator.subscriber.filtration', 1 => 'before'), 1);
        $instance->addListenerService('knp_pager.pagination', array(0 => 'knp_paginator.subscriber.sliding_pagination', 1 => 'pagination'), 1);
        $instance->addListenerService('kernel.controller', array(0 => 'data_collector.router', 1 => 'onKernelController'), 0);
        $instance->addListenerService('kernel.response', array(0 => 'monolog.handler.firephp', 1 => 'onKernelResponse'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'knp_menu.listener.voters', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'knp_paginator.subscriber.sliding_pagination', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'nelmio_api_doc.event_listener.request', 1 => 'onKernelRequest'), 0);
        $instance->addSubscriberService('response_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\ResponseListener');
        $instance->addSubscriberService('streamed_response_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\StreamedResponseListener');
        $instance->addSubscriberService('locale_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\LocaleListener');
        $instance->addSubscriberService('debug.emergency_logger_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\ErrorsLoggerListener');
        $instance->addSubscriberService('debug.deprecation_logger_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\ErrorsLoggerListener');
        $instance->addSubscriberService('session_listener', 'Symfony\\Bundle\\FrameworkBundle\\EventListener\\SessionListener');
        $instance->addSubscriberService('profiler_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\ProfilerListener');
        $instance->addSubscriberService('data_collector.request', 'Symfony\\Component\\HttpKernel\\DataCollector\\RequestDataCollector');
        $instance->addSubscriberService('router_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\RouterListener');
        $instance->addSubscriberService('security.firewall', 'Symfony\\Component\\Security\\Http\\Firewall');
        $instance->addSubscriberService('security.rememberme.response_listener', 'Symfony\\Component\\Security\\Http\\RememberMe\\ResponseListener');
        $instance->addSubscriberService('twig.exception_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\ExceptionListener');
        $instance->addSubscriberService('swiftmailer.email_sender.listener', 'Symfony\\Bundle\\SwiftmailerBundle\\EventListener\\EmailSenderListener');
        $instance->addSubscriberService('sensio_framework_extra.controller.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ControllerListener');
        $instance->addSubscriberService('sensio_framework_extra.converter.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ParamConverterListener');
        $instance->addSubscriberService('sensio_framework_extra.view.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\TemplateListener');
        $instance->addSubscriberService('sensio_framework_extra.cache.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\CacheListener');
        $instance->addSubscriberService('api.cors', 'Civix\\ApiBundle\\EventListener\\CORSSubscriber');
        $instance->addSubscriberService('web_profiler.debug_toolbar', 'Symfony\\Bundle\\WebProfilerBundle\\EventListener\\WebDebugToolbarListener');

        return $instance;
    }

    /**
     * Gets the 'ewz_recaptcha.form.type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \EWZ\Bundle\RecaptchaBundle\Form\Type\RecaptchaType A EWZ\Bundle\RecaptchaBundle\Form\Type\RecaptchaType instance.
     */
    protected function getEwzRecaptcha_Form_TypeService()
    {
        return $this->services['ewz_recaptcha.form.type'] = new \EWZ\Bundle\RecaptchaBundle\Form\Type\RecaptchaType($this);
    }

    /**
     * Gets the 'ewz_recaptcha.validator.true' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \EWZ\Bundle\RecaptchaBundle\Validator\Constraints\TrueValidator A EWZ\Bundle\RecaptchaBundle\Validator\Constraints\TrueValidator instance.
     */
    protected function getEwzRecaptcha_Validator_TrueService()
    {
        return $this->services['ewz_recaptcha.validator.true'] = new \EWZ\Bundle\RecaptchaBundle\Validator\Constraints\TrueValidator($this);
    }

    /**
     * Gets the 'file_locator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Config\FileLocator A Symfony\Component\HttpKernel\Config\FileLocator instance.
     */
    protected function getFileLocatorService()
    {
        return $this->services['file_locator'] = new \Symfony\Component\HttpKernel\Config\FileLocator($this->get('kernel'), '/srv/civix/app/Resources');
    }

    /**
     * Gets the 'filesystem' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Filesystem\Filesystem A Symfony\Component\Filesystem\Filesystem instance.
     */
    protected function getFilesystemService()
    {
        return $this->services['filesystem'] = new \Symfony\Component\Filesystem\Filesystem();
    }

    /**
     * Gets the 'form.csrf_provider' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Csrf\CsrfProvider\SessionCsrfProvider A Symfony\Component\Form\Extension\Csrf\CsrfProvider\SessionCsrfProvider instance.
     */
    protected function getForm_CsrfProviderService()
    {
        return $this->services['form.csrf_provider'] = new \Symfony\Component\Form\Extension\Csrf\CsrfProvider\SessionCsrfProvider($this->get('session'), 'ThisTokenIsNotSoSecretChangeIt');
    }

    /**
     * Gets the 'form.factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\FormFactory A Symfony\Component\Form\FormFactory instance.
     */
    protected function getForm_FactoryService()
    {
        return $this->services['form.factory'] = new \Symfony\Component\Form\FormFactory($this->get('form.registry'), $this->get('form.resolved_type_factory'));
    }

    /**
     * Gets the 'form.registry' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\FormRegistry A Symfony\Component\Form\FormRegistry instance.
     */
    protected function getForm_RegistryService()
    {
        return $this->services['form.registry'] = new \Symfony\Component\Form\FormRegistry(array(0 => new \Symfony\Component\Form\Extension\DependencyInjection\DependencyInjectionExtension($this, array('form' => 'form.type.form', 'birthday' => 'form.type.birthday', 'checkbox' => 'form.type.checkbox', 'choice' => 'form.type.choice', 'collection' => 'form.type.collection', 'country' => 'form.type.country', 'date' => 'form.type.date', 'datetime' => 'form.type.datetime', 'email' => 'form.type.email', 'file' => 'form.type.file', 'hidden' => 'form.type.hidden', 'integer' => 'form.type.integer', 'language' => 'form.type.language', 'locale' => 'form.type.locale', 'money' => 'form.type.money', 'number' => 'form.type.number', 'password' => 'form.type.password', 'percent' => 'form.type.percent', 'radio' => 'form.type.radio', 'repeated' => 'form.type.repeated', 'search' => 'form.type.search', 'textarea' => 'form.type.textarea', 'text' => 'form.type.text', 'time' => 'form.type.time', 'timezone' => 'form.type.timezone', 'url' => 'form.type.url', 'button' => 'form.type.button', 'submit' => 'form.type.submit', 'reset' => 'form.type.reset', 'currency' => 'form.type.currency', 'entity' => 'form.type.entity', 'tab' => 'mopa.form.tab_type', 'hexcolor' => 'mopa.form.hexcolor_type', 'ewz_recaptcha' => 'ewz_recaptcha.form.type', 'crop_image' => 'civix_core.crop_image.form.type', 'editable_avatar' => 'civix_core.editable_avatar.form.type'), array('form' => array(0 => 'form.type_extension.form.http_foundation', 1 => 'form.type_extension.form.validator', 2 => 'form.type_extension.csrf', 3 => 'mopa.form.help_extension', 4 => 'mopa.form.legend_extension', 5 => 'mopa.form.error_type_extension', 6 => 'mopa.form.widget_extension', 7 => 'mopa.form.widget_collection_extension', 8 => 'mopa.form.tabbed_extension', 9 => 'nelmio_api_doc.form.extension.description_form_type_extension'), 'repeated' => array(0 => 'form.type_extension.repeated.validator'), 'submit' => array(0 => 'form.type_extension.submit.validator'), 'button' => array(0 => 'mopa.form.icon_button_extension'), 'date' => array(0 => 'mopa.form.date_extension')), array(0 => 'form.type_guesser.validator', 1 => 'form.type_guesser.doctrine'))), $this->get('form.resolved_type_factory'));
    }

    /**
     * Gets the 'form.resolved_type_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\ResolvedFormTypeFactory A Symfony\Component\Form\ResolvedFormTypeFactory instance.
     */
    protected function getForm_ResolvedTypeFactoryService()
    {
        return $this->services['form.resolved_type_factory'] = new \Symfony\Component\Form\ResolvedFormTypeFactory();
    }

    /**
     * Gets the 'form.type.birthday' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\BirthdayType A Symfony\Component\Form\Extension\Core\Type\BirthdayType instance.
     */
    protected function getForm_Type_BirthdayService()
    {
        return $this->services['form.type.birthday'] = new \Symfony\Component\Form\Extension\Core\Type\BirthdayType();
    }

    /**
     * Gets the 'form.type.button' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\ButtonType A Symfony\Component\Form\Extension\Core\Type\ButtonType instance.
     */
    protected function getForm_Type_ButtonService()
    {
        return $this->services['form.type.button'] = new \Symfony\Component\Form\Extension\Core\Type\ButtonType();
    }

    /**
     * Gets the 'form.type.checkbox' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\CheckboxType A Symfony\Component\Form\Extension\Core\Type\CheckboxType instance.
     */
    protected function getForm_Type_CheckboxService()
    {
        return $this->services['form.type.checkbox'] = new \Symfony\Component\Form\Extension\Core\Type\CheckboxType();
    }

    /**
     * Gets the 'form.type.choice' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\ChoiceType A Symfony\Component\Form\Extension\Core\Type\ChoiceType instance.
     */
    protected function getForm_Type_ChoiceService()
    {
        return $this->services['form.type.choice'] = new \Symfony\Component\Form\Extension\Core\Type\ChoiceType();
    }

    /**
     * Gets the 'form.type.collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\CollectionType A Symfony\Component\Form\Extension\Core\Type\CollectionType instance.
     */
    protected function getForm_Type_CollectionService()
    {
        return $this->services['form.type.collection'] = new \Symfony\Component\Form\Extension\Core\Type\CollectionType();
    }

    /**
     * Gets the 'form.type.country' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\CountryType A Symfony\Component\Form\Extension\Core\Type\CountryType instance.
     */
    protected function getForm_Type_CountryService()
    {
        return $this->services['form.type.country'] = new \Symfony\Component\Form\Extension\Core\Type\CountryType();
    }

    /**
     * Gets the 'form.type.currency' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\CurrencyType A Symfony\Component\Form\Extension\Core\Type\CurrencyType instance.
     */
    protected function getForm_Type_CurrencyService()
    {
        return $this->services['form.type.currency'] = new \Symfony\Component\Form\Extension\Core\Type\CurrencyType();
    }

    /**
     * Gets the 'form.type.date' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\DateType A Symfony\Component\Form\Extension\Core\Type\DateType instance.
     */
    protected function getForm_Type_DateService()
    {
        return $this->services['form.type.date'] = new \Symfony\Component\Form\Extension\Core\Type\DateType();
    }

    /**
     * Gets the 'form.type.datetime' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\DateTimeType A Symfony\Component\Form\Extension\Core\Type\DateTimeType instance.
     */
    protected function getForm_Type_DatetimeService()
    {
        return $this->services['form.type.datetime'] = new \Symfony\Component\Form\Extension\Core\Type\DateTimeType();
    }

    /**
     * Gets the 'form.type.email' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\EmailType A Symfony\Component\Form\Extension\Core\Type\EmailType instance.
     */
    protected function getForm_Type_EmailService()
    {
        return $this->services['form.type.email'] = new \Symfony\Component\Form\Extension\Core\Type\EmailType();
    }

    /**
     * Gets the 'form.type.entity' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Doctrine\Form\Type\EntityType A Symfony\Bridge\Doctrine\Form\Type\EntityType instance.
     */
    protected function getForm_Type_EntityService()
    {
        return $this->services['form.type.entity'] = new \Symfony\Bridge\Doctrine\Form\Type\EntityType($this->get('doctrine'));
    }

    /**
     * Gets the 'form.type.file' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\FileType A Symfony\Component\Form\Extension\Core\Type\FileType instance.
     */
    protected function getForm_Type_FileService()
    {
        return $this->services['form.type.file'] = new \Symfony\Component\Form\Extension\Core\Type\FileType();
    }

    /**
     * Gets the 'form.type.form' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\FormType A Symfony\Component\Form\Extension\Core\Type\FormType instance.
     */
    protected function getForm_Type_FormService()
    {
        return $this->services['form.type.form'] = new \Symfony\Component\Form\Extension\Core\Type\FormType($this->get('property_accessor'));
    }

    /**
     * Gets the 'form.type.hidden' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\HiddenType A Symfony\Component\Form\Extension\Core\Type\HiddenType instance.
     */
    protected function getForm_Type_HiddenService()
    {
        return $this->services['form.type.hidden'] = new \Symfony\Component\Form\Extension\Core\Type\HiddenType();
    }

    /**
     * Gets the 'form.type.integer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\IntegerType A Symfony\Component\Form\Extension\Core\Type\IntegerType instance.
     */
    protected function getForm_Type_IntegerService()
    {
        return $this->services['form.type.integer'] = new \Symfony\Component\Form\Extension\Core\Type\IntegerType();
    }

    /**
     * Gets the 'form.type.language' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\LanguageType A Symfony\Component\Form\Extension\Core\Type\LanguageType instance.
     */
    protected function getForm_Type_LanguageService()
    {
        return $this->services['form.type.language'] = new \Symfony\Component\Form\Extension\Core\Type\LanguageType();
    }

    /**
     * Gets the 'form.type.locale' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\LocaleType A Symfony\Component\Form\Extension\Core\Type\LocaleType instance.
     */
    protected function getForm_Type_LocaleService()
    {
        return $this->services['form.type.locale'] = new \Symfony\Component\Form\Extension\Core\Type\LocaleType();
    }

    /**
     * Gets the 'form.type.money' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\MoneyType A Symfony\Component\Form\Extension\Core\Type\MoneyType instance.
     */
    protected function getForm_Type_MoneyService()
    {
        return $this->services['form.type.money'] = new \Symfony\Component\Form\Extension\Core\Type\MoneyType();
    }

    /**
     * Gets the 'form.type.number' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\NumberType A Symfony\Component\Form\Extension\Core\Type\NumberType instance.
     */
    protected function getForm_Type_NumberService()
    {
        return $this->services['form.type.number'] = new \Symfony\Component\Form\Extension\Core\Type\NumberType();
    }

    /**
     * Gets the 'form.type.password' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\PasswordType A Symfony\Component\Form\Extension\Core\Type\PasswordType instance.
     */
    protected function getForm_Type_PasswordService()
    {
        return $this->services['form.type.password'] = new \Symfony\Component\Form\Extension\Core\Type\PasswordType();
    }

    /**
     * Gets the 'form.type.percent' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\PercentType A Symfony\Component\Form\Extension\Core\Type\PercentType instance.
     */
    protected function getForm_Type_PercentService()
    {
        return $this->services['form.type.percent'] = new \Symfony\Component\Form\Extension\Core\Type\PercentType();
    }

    /**
     * Gets the 'form.type.radio' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\RadioType A Symfony\Component\Form\Extension\Core\Type\RadioType instance.
     */
    protected function getForm_Type_RadioService()
    {
        return $this->services['form.type.radio'] = new \Symfony\Component\Form\Extension\Core\Type\RadioType();
    }

    /**
     * Gets the 'form.type.repeated' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\RepeatedType A Symfony\Component\Form\Extension\Core\Type\RepeatedType instance.
     */
    protected function getForm_Type_RepeatedService()
    {
        return $this->services['form.type.repeated'] = new \Symfony\Component\Form\Extension\Core\Type\RepeatedType();
    }

    /**
     * Gets the 'form.type.reset' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\ResetType A Symfony\Component\Form\Extension\Core\Type\ResetType instance.
     */
    protected function getForm_Type_ResetService()
    {
        return $this->services['form.type.reset'] = new \Symfony\Component\Form\Extension\Core\Type\ResetType();
    }

    /**
     * Gets the 'form.type.search' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\SearchType A Symfony\Component\Form\Extension\Core\Type\SearchType instance.
     */
    protected function getForm_Type_SearchService()
    {
        return $this->services['form.type.search'] = new \Symfony\Component\Form\Extension\Core\Type\SearchType();
    }

    /**
     * Gets the 'form.type.submit' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\SubmitType A Symfony\Component\Form\Extension\Core\Type\SubmitType instance.
     */
    protected function getForm_Type_SubmitService()
    {
        return $this->services['form.type.submit'] = new \Symfony\Component\Form\Extension\Core\Type\SubmitType();
    }

    /**
     * Gets the 'form.type.text' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\TextType A Symfony\Component\Form\Extension\Core\Type\TextType instance.
     */
    protected function getForm_Type_TextService()
    {
        return $this->services['form.type.text'] = new \Symfony\Component\Form\Extension\Core\Type\TextType();
    }

    /**
     * Gets the 'form.type.textarea' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\TextareaType A Symfony\Component\Form\Extension\Core\Type\TextareaType instance.
     */
    protected function getForm_Type_TextareaService()
    {
        return $this->services['form.type.textarea'] = new \Symfony\Component\Form\Extension\Core\Type\TextareaType();
    }

    /**
     * Gets the 'form.type.time' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\TimeType A Symfony\Component\Form\Extension\Core\Type\TimeType instance.
     */
    protected function getForm_Type_TimeService()
    {
        return $this->services['form.type.time'] = new \Symfony\Component\Form\Extension\Core\Type\TimeType();
    }

    /**
     * Gets the 'form.type.timezone' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\TimezoneType A Symfony\Component\Form\Extension\Core\Type\TimezoneType instance.
     */
    protected function getForm_Type_TimezoneService()
    {
        return $this->services['form.type.timezone'] = new \Symfony\Component\Form\Extension\Core\Type\TimezoneType();
    }

    /**
     * Gets the 'form.type.url' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\UrlType A Symfony\Component\Form\Extension\Core\Type\UrlType instance.
     */
    protected function getForm_Type_UrlService()
    {
        return $this->services['form.type.url'] = new \Symfony\Component\Form\Extension\Core\Type\UrlType();
    }

    /**
     * Gets the 'form.type_extension.csrf' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Csrf\Type\FormTypeCsrfExtension A Symfony\Component\Form\Extension\Csrf\Type\FormTypeCsrfExtension instance.
     */
    protected function getForm_TypeExtension_CsrfService()
    {
        return $this->services['form.type_extension.csrf'] = new \Symfony\Component\Form\Extension\Csrf\Type\FormTypeCsrfExtension($this->get('form.csrf_provider'), true, '_token', $this->get('translator.default'), 'validators');
    }

    /**
     * Gets the 'form.type_extension.form.http_foundation' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\HttpFoundation\Type\FormTypeHttpFoundationExtension A Symfony\Component\Form\Extension\HttpFoundation\Type\FormTypeHttpFoundationExtension instance.
     */
    protected function getForm_TypeExtension_Form_HttpFoundationService()
    {
        return $this->services['form.type_extension.form.http_foundation'] = new \Symfony\Component\Form\Extension\HttpFoundation\Type\FormTypeHttpFoundationExtension();
    }

    /**
     * Gets the 'form.type_extension.form.validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Validator\Type\FormTypeValidatorExtension A Symfony\Component\Form\Extension\Validator\Type\FormTypeValidatorExtension instance.
     */
    protected function getForm_TypeExtension_Form_ValidatorService()
    {
        return $this->services['form.type_extension.form.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\FormTypeValidatorExtension($this->get('validator'));
    }

    /**
     * Gets the 'form.type_extension.repeated.validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Validator\Type\RepeatedTypeValidatorExtension A Symfony\Component\Form\Extension\Validator\Type\RepeatedTypeValidatorExtension instance.
     */
    protected function getForm_TypeExtension_Repeated_ValidatorService()
    {
        return $this->services['form.type_extension.repeated.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\RepeatedTypeValidatorExtension();
    }

    /**
     * Gets the 'form.type_extension.submit.validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Validator\Type\SubmitTypeValidatorExtension A Symfony\Component\Form\Extension\Validator\Type\SubmitTypeValidatorExtension instance.
     */
    protected function getForm_TypeExtension_Submit_ValidatorService()
    {
        return $this->services['form.type_extension.submit.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\SubmitTypeValidatorExtension();
    }

    /**
     * Gets the 'form.type_guesser.doctrine' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser A Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser instance.
     */
    protected function getForm_TypeGuesser_DoctrineService()
    {
        return $this->services['form.type_guesser.doctrine'] = new \Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser($this->get('doctrine'));
    }

    /**
     * Gets the 'form.type_guesser.validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Validator\ValidatorTypeGuesser A Symfony\Component\Form\Extension\Validator\ValidatorTypeGuesser instance.
     */
    protected function getForm_TypeGuesser_ValidatorService()
    {
        return $this->services['form.type_guesser.validator'] = new \Symfony\Component\Form\Extension\Validator\ValidatorTypeGuesser($this->get('validator.mapping.class_metadata_factory'));
    }

    /**
     * Gets the 'fragment.handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Fragment\FragmentHandler A Symfony\Component\HttpKernel\Fragment\FragmentHandler instance.
     */
    protected function getFragment_HandlerService()
    {
        $this->services['fragment.handler'] = $instance = new \Symfony\Component\HttpKernel\Fragment\FragmentHandler(array(), true);

        $instance->setRequest($this->get('request', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        $instance->addRenderer($this->get('fragment.renderer.inline'));
        $instance->addRenderer($this->get('fragment.renderer.hinclude'));

        return $instance;
    }

    /**
     * Gets the 'fragment.renderer.hinclude' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Fragment\ContainerAwareHIncludeFragmentRenderer A Symfony\Bundle\FrameworkBundle\Fragment\ContainerAwareHIncludeFragmentRenderer instance.
     */
    protected function getFragment_Renderer_HincludeService()
    {
        $this->services['fragment.renderer.hinclude'] = $instance = new \Symfony\Bundle\FrameworkBundle\Fragment\ContainerAwareHIncludeFragmentRenderer($this, $this->get('uri_signer'), NULL);

        $instance->setFragmentPath('/_fragment');

        return $instance;
    }

    /**
     * Gets the 'fragment.renderer.inline' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer A Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer instance.
     */
    protected function getFragment_Renderer_InlineService()
    {
        $this->services['fragment.renderer.inline'] = $instance = new \Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer($this->get('http_kernel'), $this->get('event_dispatcher'));

        $instance->setFragmentPath('/_fragment');

        return $instance;
    }

    /**
     * Gets the 'gaufrette.avatar_image_fs_filesystem' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Gaufrette\Filesystem A Gaufrette\Filesystem instance.
     */
    protected function getGaufrette_AvatarImageFsFilesystemService()
    {
        return $this->services['gaufrette.avatar_image_fs_filesystem'] = new \Gaufrette\Filesystem(new \Gaufrette\Adapter\AwsS3($this->get('aws_s3.client'), 'stagingpowerline', array('directory' => 'avatars', 'create' => false, 'acl' => 'private'), false));
    }

    /**
     * Gets the 'gaufrette.avatar_representative_fs_filesystem' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Gaufrette\Filesystem A Gaufrette\Filesystem instance.
     */
    protected function getGaufrette_AvatarRepresentativeFsFilesystemService()
    {
        return $this->services['gaufrette.avatar_representative_fs_filesystem'] = new \Gaufrette\Filesystem(new \Gaufrette\Adapter\AwsS3($this->get('aws_s3.client'), 'stagingpowerline', array('directory' => 'avatars/representatives', 'create' => false, 'acl' => 'private'), false));
    }

    /**
     * Gets the 'gaufrette.avatar_source_image_fs_filesystem' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Gaufrette\Filesystem A Gaufrette\Filesystem instance.
     */
    protected function getGaufrette_AvatarSourceImageFsFilesystemService()
    {
        return $this->services['gaufrette.avatar_source_image_fs_filesystem'] = new \Gaufrette\Filesystem(new \Gaufrette\Adapter\AwsS3($this->get('aws_s3.client'), 'stagingpowerline', array('directory' => 'avatars/src', 'create' => false, 'acl' => 'private'), false));
    }

    /**
     * Gets the 'gaufrette.blog_post_fs_filesystem' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Gaufrette\Filesystem A Gaufrette\Filesystem instance.
     */
    protected function getGaufrette_BlogPostFsFilesystemService()
    {
        return $this->services['gaufrette.blog_post_fs_filesystem'] = new \Gaufrette\Filesystem(new \Gaufrette\Adapter\AwsS3($this->get('aws_s3.client'), 'stagingpowerline', array('directory' => 'posts', 'create' => false, 'acl' => 'private'), false));
    }

    /**
     * Gets the 'gaufrette.educational_image_fs_filesystem' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Gaufrette\Filesystem A Gaufrette\Filesystem instance.
     */
    protected function getGaufrette_EducationalImageFsFilesystemService()
    {
        return $this->services['gaufrette.educational_image_fs_filesystem'] = new \Gaufrette\Filesystem(new \Gaufrette\Adapter\AwsS3($this->get('aws_s3.client'), 'stagingpowerline', array('directory' => 'educational', 'create' => false, 'acl' => 'private'), false));
    }

    /**
     * Gets the 'http_kernel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\DependencyInjection\ContainerAwareHttpKernel A Symfony\Component\HttpKernel\DependencyInjection\ContainerAwareHttpKernel instance.
     */
    protected function getHttpKernelService()
    {
        return $this->services['http_kernel'] = new \Symfony\Component\HttpKernel\DependencyInjection\ContainerAwareHttpKernel($this->get('debug.event_dispatcher'), $this, $this->get('debug.controller_resolver'));
    }

    /**
     * Gets the 'jms_aop.interceptor_loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\AopBundle\Aop\InterceptorLoader A JMS\AopBundle\Aop\InterceptorLoader instance.
     */
    protected function getJmsAop_InterceptorLoaderService()
    {
        return $this->services['jms_aop.interceptor_loader'] = new \JMS\AopBundle\Aop\InterceptorLoader($this, array());
    }

    /**
     * Gets the 'jms_aop.pointcut_container' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\AopBundle\Aop\PointcutContainer A JMS\AopBundle\Aop\PointcutContainer instance.
     */
    protected function getJmsAop_PointcutContainerService()
    {
        return $this->services['jms_aop.pointcut_container'] = new \JMS\AopBundle\Aop\PointcutContainer(array('security.access.method_interceptor' => $this->get('security.access.pointcut')));
    }

    /**
     * Gets the 'jms_di_extra.metadata.converter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\DiExtraBundle\Metadata\MetadataConverter A JMS\DiExtraBundle\Metadata\MetadataConverter instance.
     */
    protected function getJmsDiExtra_Metadata_ConverterService()
    {
        return $this->services['jms_di_extra.metadata.converter'] = new \JMS\DiExtraBundle\Metadata\MetadataConverter();
    }

    /**
     * Gets the 'jms_di_extra.metadata.metadata_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Metadata\MetadataFactory A Metadata\MetadataFactory instance.
     */
    protected function getJmsDiExtra_Metadata_MetadataFactoryService()
    {
        $this->services['jms_di_extra.metadata.metadata_factory'] = $instance = new \Metadata\MetadataFactory(new \Metadata\Driver\LazyLoadingDriver($this, 'jms_di_extra.metadata_driver'), 'Metadata\\ClassHierarchyMetadata', true);

        $instance->setCache(new \Metadata\Cache\FileCache('/srv/civix/app/cache/dev/jms_diextra/metadata'));

        return $instance;
    }

    /**
     * Gets the 'jms_di_extra.metadata_driver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\DiExtraBundle\Metadata\Driver\AnnotationDriver A JMS\DiExtraBundle\Metadata\Driver\AnnotationDriver instance.
     */
    protected function getJmsDiExtra_MetadataDriverService()
    {
        return $this->services['jms_di_extra.metadata_driver'] = new \JMS\DiExtraBundle\Metadata\Driver\AnnotationDriver($this->get('annotation_reader'));
    }

    /**
     * Gets the 'jms_serializer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Serializer A JMS\Serializer\Serializer instance.
     */
    protected function getJmsSerializerService()
    {
        $a = new \JMS\Serializer\EventDispatcher\LazyEventDispatcher($this);
        $a->setListeners(array('serializer.pre_serialize' => array(0 => array(0 => array(0 => 'jms_serializer.stopwatch_subscriber', 1 => 'onPreSerialize'), 1 => NULL, 2 => NULL), 1 => array(0 => array(0 => 'jms_serializer.doctrine_proxy_subscriber', 1 => 'onPreSerialize'), 1 => NULL, 2 => NULL)), 'serializer.post_serialize' => array(0 => array(0 => array(0 => 'jms_serializer.stopwatch_subscriber', 1 => 'onPostSerialize'), 1 => NULL, 2 => NULL))));

        return $this->services['jms_serializer'] = new \JMS\Serializer\Serializer($this->get('jms_serializer.metadata_factory'), $this->get('jms_serializer.handler_registry'), $this->get('jms_serializer.unserialize_object_constructor'), new \JMS\DiExtraBundle\DependencyInjection\Collection\LazyServiceMap($this, array('json' => 'jms_serializer.json_serialization_visitor', 'xml' => 'jms_serializer.xml_serialization_visitor', 'yml' => 'jms_serializer.yaml_serialization_visitor')), new \JMS\DiExtraBundle\DependencyInjection\Collection\LazyServiceMap($this, array('json' => 'jms_serializer.json_deserialization_visitor', 'xml' => 'jms_serializer.xml_deserialization_visitor')), $a);
    }

    /**
     * Gets the 'jms_serializer.array_collection_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Handler\ArrayCollectionHandler A JMS\Serializer\Handler\ArrayCollectionHandler instance.
     */
    protected function getJmsSerializer_ArrayCollectionHandlerService()
    {
        return $this->services['jms_serializer.array_collection_handler'] = new \JMS\Serializer\Handler\ArrayCollectionHandler();
    }

    /**
     * Gets the 'jms_serializer.constraint_violation_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Handler\ConstraintViolationHandler A JMS\Serializer\Handler\ConstraintViolationHandler instance.
     */
    protected function getJmsSerializer_ConstraintViolationHandlerService()
    {
        return $this->services['jms_serializer.constraint_violation_handler'] = new \JMS\Serializer\Handler\ConstraintViolationHandler();
    }

    /**
     * Gets the 'jms_serializer.datetime_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Handler\DateHandler A JMS\Serializer\Handler\DateHandler instance.
     */
    protected function getJmsSerializer_DatetimeHandlerService()
    {
        return $this->services['jms_serializer.datetime_handler'] = new \JMS\Serializer\Handler\DateHandler('Y-m-d\\TH:i:sO', 'UTC', true);
    }

    /**
     * Gets the 'jms_serializer.doctrine_proxy_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\EventDispatcher\Subscriber\DoctrineProxySubscriber A JMS\Serializer\EventDispatcher\Subscriber\DoctrineProxySubscriber instance.
     */
    protected function getJmsSerializer_DoctrineProxySubscriberService()
    {
        return $this->services['jms_serializer.doctrine_proxy_subscriber'] = new \JMS\Serializer\EventDispatcher\Subscriber\DoctrineProxySubscriber();
    }

    /**
     * Gets the 'jms_serializer.form_error_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Handler\FormErrorHandler A JMS\Serializer\Handler\FormErrorHandler instance.
     */
    protected function getJmsSerializer_FormErrorHandlerService()
    {
        return $this->services['jms_serializer.form_error_handler'] = new \JMS\Serializer\Handler\FormErrorHandler($this->get('translator'));
    }

    /**
     * Gets the 'jms_serializer.handler_registry' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Handler\LazyHandlerRegistry A JMS\Serializer\Handler\LazyHandlerRegistry instance.
     */
    protected function getJmsSerializer_HandlerRegistryService()
    {
        return $this->services['jms_serializer.handler_registry'] = new \JMS\Serializer\Handler\LazyHandlerRegistry($this, array(1 => array('Avatar' => array('json' => array(0 => 'civix_core.serializer.handler.avatar_handler', 1 => 'serialize')), 'OwnerData' => array('json' => array(0 => 'civix_core.serializer.handler.owner_data_handler', 1 => 'serialize')), 'Image' => array('json' => array(0 => 'civix_core.serializer.handler.image_handler', 1 => 'serialize')), 'JoinStatus' => array('json' => array(0 => 'civix_core.serializer.handler.join_status_handler', 1 => 'serialize')), 'DateTime' => array('json' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateTime'), 'xml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateTime'), 'yml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateTime')), 'DateInterval' => array('json' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateInterval'), 'xml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateInterval'), 'yml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateInterval')), 'ArrayCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection')), 'Doctrine\\Common\\Collections\\ArrayCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection')), 'Doctrine\\ORM\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection')), 'Doctrine\\ODM\\MongoDB\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection')), 'Doctrine\\ODM\\PHPCR\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection')), 'PhpCollection\\Sequence' => array('json' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeSequence'), 'xml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeSequence'), 'yml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeSequence')), 'PhpCollection\\Map' => array('json' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeMap'), 'xml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeMap'), 'yml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeMap')), 'Symfony\\Component\\Form\\Form' => array('xml' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormToxml'), 'json' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormTojson'), 'yml' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormToyml')), 'Symfony\\Component\\Form\\FormError' => array('xml' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormErrorToxml'), 'json' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormErrorTojson'), 'yml' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormErrorToyml')), 'Symfony\\Component\\Validator\\ConstraintViolationList' => array('xml' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeListToxml'), 'json' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeListTojson'), 'yml' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeListToyml')), 'Symfony\\Component\\Validator\\ConstraintViolation' => array('xml' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeViolationToxml'), 'json' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeViolationTojson'), 'yml' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeViolationToyml'))), 2 => array('Avatar' => array('json' => array(0 => 'civix_core.deserializer.handler.avatar_handler', 1 => 'deserialize')), 'DateTime' => array('json' => array(0 => 'jms_serializer.datetime_handler', 1 => 'deserializeDateTimeFromjson'), 'xml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'deserializeDateTimeFromxml'), 'yml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'deserializeDateTimeFromyml')), 'ArrayCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection')), 'Doctrine\\Common\\Collections\\ArrayCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection')), 'Doctrine\\ORM\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection')), 'Doctrine\\ODM\\MongoDB\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection')), 'Doctrine\\ODM\\PHPCR\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection')), 'PhpCollection\\Sequence' => array('json' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeSequence'), 'xml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeSequence'), 'yml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeSequence')), 'PhpCollection\\Map' => array('json' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeMap'), 'xml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeMap'), 'yml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeMap')))));
    }

    /**
     * Gets the 'jms_serializer.json_deserialization_visitor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\JsonDeserializationVisitor A JMS\Serializer\JsonDeserializationVisitor instance.
     */
    protected function getJmsSerializer_JsonDeserializationVisitorService()
    {
        return $this->services['jms_serializer.json_deserialization_visitor'] = new \JMS\Serializer\JsonDeserializationVisitor($this->get('jms_serializer.naming_strategy'), $this->get('jms_serializer.unserialize_object_constructor'));
    }

    /**
     * Gets the 'jms_serializer.json_serialization_visitor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\JsonSerializationVisitor A JMS\Serializer\JsonSerializationVisitor instance.
     */
    protected function getJmsSerializer_JsonSerializationVisitorService()
    {
        $this->services['jms_serializer.json_serialization_visitor'] = $instance = new \JMS\Serializer\JsonSerializationVisitor($this->get('jms_serializer.naming_strategy'));

        $instance->setOptions(0);

        return $instance;
    }

    /**
     * Gets the 'jms_serializer.metadata_driver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Metadata\Driver\DoctrineTypeDriver A JMS\Serializer\Metadata\Driver\DoctrineTypeDriver instance.
     */
    protected function getJmsSerializer_MetadataDriverService()
    {
        $a = new \Metadata\Driver\FileLocator(array('Symfony\\Bundle\\FrameworkBundle' => '/srv/civix/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/config/serializer', 'Symfony\\Bundle\\SecurityBundle' => '/srv/civix/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/Resources/config/serializer', 'Symfony\\Bundle\\TwigBundle' => '/srv/civix/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/config/serializer', 'Symfony\\Bundle\\MonologBundle' => '/srv/civix/vendor/symfony/monolog-bundle/Symfony/Bundle/MonologBundle/Resources/config/serializer', 'Symfony\\Bundle\\SwiftmailerBundle' => '/srv/civix/vendor/symfony/swiftmailer-bundle/Resources/config/serializer', 'Symfony\\Bundle\\AsseticBundle' => '/srv/civix/vendor/symfony/assetic-bundle/Symfony/Bundle/AsseticBundle/Resources/config/serializer', 'Doctrine\\Bundle\\DoctrineBundle' => '/srv/civix/vendor/doctrine/doctrine-bundle/Doctrine/Bundle/DoctrineBundle/Resources/config/serializer', 'Doctrine\\Bundle\\FixturesBundle' => '/srv/civix/vendor/doctrine/doctrine-fixtures-bundle/Doctrine/Bundle/FixturesBundle/Resources/config/serializer', 'Doctrine\\Bundle\\MigrationsBundle' => '/srv/civix/vendor/doctrine/doctrine-migrations-bundle/Doctrine/Bundle/MigrationsBundle/Resources/config/serializer', 'Sensio\\Bundle\\FrameworkExtraBundle' => '/srv/civix/vendor/sensio/framework-extra-bundle/Sensio/Bundle/FrameworkExtraBundle/Resources/config/serializer', 'JMS\\AopBundle' => '/srv/civix/vendor/jms/aop-bundle/JMS/AopBundle/Resources/config/serializer', 'JMS\\DiExtraBundle' => '/srv/civix/vendor/jms/di-extra-bundle/JMS/DiExtraBundle/Resources/config/serializer', 'JMS\\SecurityExtraBundle' => '/srv/civix/vendor/jms/security-extra-bundle/JMS/SecurityExtraBundle/Resources/config/serializer', 'JMS\\SerializerBundle' => '/srv/civix/vendor/jms/serializer-bundle/JMS/SerializerBundle/Resources/config/serializer', 'Mopa\\Bundle\\BootstrapBundle' => '/srv/civix/vendor/mopa/bootstrap-bundle/Mopa/Bundle/BootstrapBundle/Resources/config/serializer', 'Knp\\Bundle\\MenuBundle' => '/srv/civix/vendor/knplabs/knp-menu-bundle/Knp/Bundle/MenuBundle/Resources/config/serializer', 'Knp\\Bundle\\PaginatorBundle' => '/srv/civix/vendor/knplabs/knp-paginator-bundle/Knp/Bundle/PaginatorBundle/Resources/config/serializer', 'EWZ\\Bundle\\RecaptchaBundle' => '/srv/civix/vendor/excelwebzone/recaptcha-bundle/EWZ/Bundle/RecaptchaBundle/Resources/config/serializer', 'Knp\\Bundle\\GaufretteBundle' => '/srv/civix/vendor/knplabs/knp-gaufrette-bundle/Resources/config/serializer', 'Vich\\UploaderBundle' => '/srv/civix/vendor/vich/uploader-bundle/Vich/UploaderBundle/Resources/config/serializer', 'RMS\\PushNotificationsBundle' => '/srv/civix/vendor/richsage/rms-push-notifications-bundle/RMS/PushNotificationsBundle/Resources/config/serializer', 'OldSound\\RabbitMqBundle' => '/srv/civix/vendor/oldsound/rabbitmq-bundle/OldSound/RabbitMqBundle/Resources/config/serializer', 'Civix\\FrontBundle' => '/srv/civix/src/Civix/FrontBundle/Resources/config/serializer', 'Civix\\CoreBundle' => '/srv/civix/src/Civix/CoreBundle/Resources/config/serializer', 'Civix\\ApiBundle' => '/srv/civix/src/Civix/ApiBundle/Resources/config/serializer', 'Civix\\BalancedBundle' => '/srv/civix/src/Civix/BalancedBundle/Resources/config/serializer', 'Symfony\\Bundle\\WebProfilerBundle' => '/srv/civix/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/config/serializer', 'Sensio\\Bundle\\DistributionBundle' => '/srv/civix/vendor/sensio/distribution-bundle/Sensio/Bundle/DistributionBundle/Resources/config/serializer', 'Sensio\\Bundle\\GeneratorBundle' => '/srv/civix/vendor/sensio/generator-bundle/Sensio/Bundle/GeneratorBundle/Resources/config/serializer', 'Nelmio\\ApiDocBundle' => '/srv/civix/vendor/nelmio/api-doc-bundle/Nelmio/ApiDocBundle/Resources/config/serializer', 'Civix\\LoadBundle' => '/srv/civix/src/Civix/LoadBundle/Resources/config/serializer'));

        return $this->services['jms_serializer.metadata_driver'] = new \JMS\Serializer\Metadata\Driver\DoctrineTypeDriver(new \Metadata\Driver\DriverChain(array(0 => new \JMS\Serializer\Metadata\Driver\YamlDriver($a), 1 => new \JMS\Serializer\Metadata\Driver\XmlDriver($a), 2 => new \JMS\Serializer\Metadata\Driver\PhpDriver($a), 3 => new \JMS\Serializer\Metadata\Driver\AnnotationDriver($this->get('annotation_reader')))), $this->get('doctrine'));
    }

    /**
     * Gets the 'jms_serializer.naming_strategy' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Naming\CacheNamingStrategy A JMS\Serializer\Naming\CacheNamingStrategy instance.
     */
    protected function getJmsSerializer_NamingStrategyService()
    {
        return $this->services['jms_serializer.naming_strategy'] = new \JMS\Serializer\Naming\CacheNamingStrategy(new \JMS\Serializer\Naming\SerializedNameAnnotationStrategy(new \JMS\Serializer\Naming\CamelCaseNamingStrategy('_', true)));
    }

    /**
     * Gets the 'jms_serializer.object_constructor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Construction\DoctrineObjectConstructor A JMS\Serializer\Construction\DoctrineObjectConstructor instance.
     */
    protected function getJmsSerializer_ObjectConstructorService()
    {
        return $this->services['jms_serializer.object_constructor'] = new \JMS\Serializer\Construction\DoctrineObjectConstructor($this->get('doctrine'), $this->get('jms_serializer.unserialize_object_constructor'));
    }

    /**
     * Gets the 'jms_serializer.php_collection_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Handler\PhpCollectionHandler A JMS\Serializer\Handler\PhpCollectionHandler instance.
     */
    protected function getJmsSerializer_PhpCollectionHandlerService()
    {
        return $this->services['jms_serializer.php_collection_handler'] = new \JMS\Serializer\Handler\PhpCollectionHandler();
    }

    /**
     * Gets the 'jms_serializer.stopwatch_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\SerializerBundle\Serializer\StopwatchEventSubscriber A JMS\SerializerBundle\Serializer\StopwatchEventSubscriber instance.
     */
    protected function getJmsSerializer_StopwatchSubscriberService()
    {
        return $this->services['jms_serializer.stopwatch_subscriber'] = new \JMS\SerializerBundle\Serializer\StopwatchEventSubscriber($this->get('debug.stopwatch'));
    }

    /**
     * Gets the 'jms_serializer.templating.helper.serializer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\SerializerBundle\Templating\SerializerHelper A JMS\SerializerBundle\Templating\SerializerHelper instance.
     */
    protected function getJmsSerializer_Templating_Helper_SerializerService()
    {
        return $this->services['jms_serializer.templating.helper.serializer'] = new \JMS\SerializerBundle\Templating\SerializerHelper($this->get('jms_serializer'));
    }

    /**
     * Gets the 'jms_serializer.xml_deserialization_visitor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\XmlDeserializationVisitor A JMS\Serializer\XmlDeserializationVisitor instance.
     */
    protected function getJmsSerializer_XmlDeserializationVisitorService()
    {
        $this->services['jms_serializer.xml_deserialization_visitor'] = $instance = new \JMS\Serializer\XmlDeserializationVisitor($this->get('jms_serializer.naming_strategy'), $this->get('jms_serializer.unserialize_object_constructor'));

        $instance->setDoctypeWhitelist(array());

        return $instance;
    }

    /**
     * Gets the 'jms_serializer.xml_serialization_visitor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\XmlSerializationVisitor A JMS\Serializer\XmlSerializationVisitor instance.
     */
    protected function getJmsSerializer_XmlSerializationVisitorService()
    {
        return $this->services['jms_serializer.xml_serialization_visitor'] = new \JMS\Serializer\XmlSerializationVisitor($this->get('jms_serializer.naming_strategy'));
    }

    /**
     * Gets the 'jms_serializer.yaml_serialization_visitor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\YamlSerializationVisitor A JMS\Serializer\YamlSerializationVisitor instance.
     */
    protected function getJmsSerializer_YamlSerializationVisitorService()
    {
        return $this->services['jms_serializer.yaml_serialization_visitor'] = new \JMS\Serializer\YamlSerializationVisitor($this->get('jms_serializer.naming_strategy'));
    }

    /**
     * Gets the 'kernel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws RuntimeException always since this service is expected to be injected dynamically
     */
    protected function getKernelService()
    {
        throw new RuntimeException('You have requested a synthetic service ("kernel"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'knp_gaufrette.filesystem_map' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Bundle\GaufretteBundle\FilesystemMap A Knp\Bundle\GaufretteBundle\FilesystemMap instance.
     */
    protected function getKnpGaufrette_FilesystemMapService()
    {
        return $this->services['knp_gaufrette.filesystem_map'] = new \Knp\Bundle\GaufretteBundle\FilesystemMap(array('avatar_image_fs' => $this->get('gaufrette.avatar_image_fs_filesystem'), 'avatar_source_image_fs' => $this->get('gaufrette.avatar_source_image_fs_filesystem'), 'avatar_representative_fs' => $this->get('gaufrette.avatar_representative_fs_filesystem'), 'educational_image_fs' => $this->get('gaufrette.educational_image_fs_filesystem'), 'blog_post_fs' => $this->get('gaufrette.blog_post_fs_filesystem')));
    }

    /**
     * Gets the 'knp_menu.factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Menu\MenuFactory A Knp\Menu\MenuFactory instance.
     */
    protected function getKnpMenu_FactoryService()
    {
        $this->services['knp_menu.factory'] = $instance = new \Knp\Menu\MenuFactory();

        $instance->addExtension(new \Knp\Menu\Integration\Symfony\RoutingExtension($this->get('router')), 0);

        return $instance;
    }

    /**
     * Gets the 'knp_menu.listener.voters' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Bundle\MenuBundle\EventListener\VoterInitializerListener A Knp\Bundle\MenuBundle\EventListener\VoterInitializerListener instance.
     */
    protected function getKnpMenu_Listener_VotersService()
    {
        $this->services['knp_menu.listener.voters'] = $instance = new \Knp\Bundle\MenuBundle\EventListener\VoterInitializerListener();

        $instance->addVoter($this->get('knp_menu.voter.router'));

        return $instance;
    }

    /**
     * Gets the 'knp_menu.matcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Menu\Matcher\Matcher A Knp\Menu\Matcher\Matcher instance.
     */
    protected function getKnpMenu_MatcherService()
    {
        $this->services['knp_menu.matcher'] = $instance = new \Knp\Menu\Matcher\Matcher();

        $instance->addVoter($this->get('knp_menu.voter.router'));

        return $instance;
    }

    /**
     * Gets the 'knp_menu.menu_provider' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Menu\Provider\ChainProvider A Knp\Menu\Provider\ChainProvider instance.
     */
    protected function getKnpMenu_MenuProviderService()
    {
        return $this->services['knp_menu.menu_provider'] = new \Knp\Menu\Provider\ChainProvider(array(0 => new \Knp\Bundle\MenuBundle\Provider\ContainerAwareProvider($this, array('main' => 'civix_front.navbar_group_members_menu')), 1 => new \Knp\Bundle\MenuBundle\Provider\BuilderAliasProvider($this->get('kernel'), $this, $this->get('knp_menu.factory'))));
    }

    /**
     * Gets the 'knp_menu.renderer.list' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Menu\Renderer\ListRenderer A Knp\Menu\Renderer\ListRenderer instance.
     */
    protected function getKnpMenu_Renderer_ListService()
    {
        return $this->services['knp_menu.renderer.list'] = new \Knp\Menu\Renderer\ListRenderer($this->get('knp_menu.matcher'), array(), 'UTF-8');
    }

    /**
     * Gets the 'knp_menu.renderer.twig' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Menu\Renderer\TwigRenderer A Knp\Menu\Renderer\TwigRenderer instance.
     */
    protected function getKnpMenu_Renderer_TwigService()
    {
        return $this->services['knp_menu.renderer.twig'] = new \Knp\Menu\Renderer\TwigRenderer($this->get('twig'), 'knp_menu.html.twig', $this->get('knp_menu.matcher'), array());
    }

    /**
     * Gets the 'knp_menu.renderer_provider' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Bundle\MenuBundle\Renderer\ContainerAwareProvider A Knp\Bundle\MenuBundle\Renderer\ContainerAwareProvider instance.
     */
    protected function getKnpMenu_RendererProviderService()
    {
        return $this->services['knp_menu.renderer_provider'] = new \Knp\Bundle\MenuBundle\Renderer\ContainerAwareProvider($this, 'twig', array('navbar' => 'mopa_bootstrap.navbar_renderer', 'list' => 'knp_menu.renderer.list', 'twig' => 'knp_menu.renderer.twig'));
    }

    /**
     * Gets the 'knp_menu.voter.router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Menu\Matcher\Voter\RouteVoter A Knp\Menu\Matcher\Voter\RouteVoter instance.
     */
    protected function getKnpMenu_Voter_RouterService()
    {
        return $this->services['knp_menu.voter.router'] = new \Knp\Menu\Matcher\Voter\RouteVoter();
    }

    /**
     * Gets the 'knp_paginator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Component\Pager\Paginator A Knp\Component\Pager\Paginator instance.
     */
    protected function getKnpPaginatorService()
    {
        $this->services['knp_paginator'] = $instance = new \Knp\Component\Pager\Paginator($this->get('event_dispatcher'));

        $instance->setDefaultPaginatorOptions(array('pageParameterName' => 'page', 'sortFieldParameterName' => 'sort', 'sortDirectionParameterName' => 'direction', 'filterFieldParameterName' => 'filterField', 'filterValueParameterName' => 'filterValue', 'distinct' => true));

        return $instance;
    }

    /**
     * Gets the 'knp_paginator.helper.processor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Bundle\PaginatorBundle\Helper\Processor A Knp\Bundle\PaginatorBundle\Helper\Processor instance.
     */
    protected function getKnpPaginator_Helper_ProcessorService()
    {
        return $this->services['knp_paginator.helper.processor'] = new \Knp\Bundle\PaginatorBundle\Helper\Processor($this->get('templating.helper.router'), $this->get('translator'));
    }

    /**
     * Gets the 'knp_paginator.subscriber.filtration' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Component\Pager\Event\Subscriber\Filtration\FiltrationSubscriber A Knp\Component\Pager\Event\Subscriber\Filtration\FiltrationSubscriber instance.
     */
    protected function getKnpPaginator_Subscriber_FiltrationService()
    {
        return $this->services['knp_paginator.subscriber.filtration'] = new \Knp\Component\Pager\Event\Subscriber\Filtration\FiltrationSubscriber();
    }

    /**
     * Gets the 'knp_paginator.subscriber.paginate' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Component\Pager\Event\Subscriber\Paginate\PaginationSubscriber A Knp\Component\Pager\Event\Subscriber\Paginate\PaginationSubscriber instance.
     */
    protected function getKnpPaginator_Subscriber_PaginateService()
    {
        return $this->services['knp_paginator.subscriber.paginate'] = new \Knp\Component\Pager\Event\Subscriber\Paginate\PaginationSubscriber();
    }

    /**
     * Gets the 'knp_paginator.subscriber.sliding_pagination' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Bundle\PaginatorBundle\Subscriber\SlidingPaginationSubscriber A Knp\Bundle\PaginatorBundle\Subscriber\SlidingPaginationSubscriber instance.
     */
    protected function getKnpPaginator_Subscriber_SlidingPaginationService()
    {
        return $this->services['knp_paginator.subscriber.sliding_pagination'] = new \Knp\Bundle\PaginatorBundle\Subscriber\SlidingPaginationSubscriber(array('defaultPaginationTemplate' => 'MopaBootstrapBundle:Pagination:sliding.html.twig', 'defaultSortableTemplate' => 'KnpPaginatorBundle:Pagination:sortable_link.html.twig', 'defaultFiltrationTemplate' => 'KnpPaginatorBundle:Pagination:filtration.html.twig', 'defaultPageRange' => 5));
    }

    /**
     * Gets the 'knp_paginator.subscriber.sortable' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Component\Pager\Event\Subscriber\Sortable\SortableSubscriber A Knp\Component\Pager\Event\Subscriber\Sortable\SortableSubscriber instance.
     */
    protected function getKnpPaginator_Subscriber_SortableService()
    {
        return $this->services['knp_paginator.subscriber.sortable'] = new \Knp\Component\Pager\Event\Subscriber\Sortable\SortableSubscriber();
    }

    /**
     * Gets the 'knp_paginator.templating.helper.pagination' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Bundle\PaginatorBundle\Templating\PaginationHelper A Knp\Bundle\PaginatorBundle\Templating\PaginationHelper instance.
     */
    protected function getKnpPaginator_Templating_Helper_PaginationService()
    {
        return $this->services['knp_paginator.templating.helper.pagination'] = new \Knp\Bundle\PaginatorBundle\Templating\PaginationHelper($this->get('knp_paginator.helper.processor'), $this->get('debug.templating.engine.php'));
    }

    /**
     * Gets the 'knp_paginator.twig.extension.pagination' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension A Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension instance.
     */
    protected function getKnpPaginator_Twig_Extension_PaginationService()
    {
        return $this->services['knp_paginator.twig.extension.pagination'] = new \Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension($this->get('knp_paginator.helper.processor'));
    }

    /**
     * Gets the 'locale_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\LocaleListener A Symfony\Component\HttpKernel\EventListener\LocaleListener instance.
     */
    protected function getLocaleListenerService()
    {
        $this->services['locale_listener'] = $instance = new \Symfony\Component\HttpKernel\EventListener\LocaleListener('en', $this->get('router', ContainerInterface::NULL_ON_INVALID_REFERENCE));

        $instance->setRequest($this->get('request', ContainerInterface::NULL_ON_INVALID_REFERENCE));

        return $instance;
    }

    /**
     * Gets the 'logger' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getLoggerService()
    {
        $this->services['logger'] = $instance = new \Symfony\Bridge\Monolog\Logger('app');

        $instance->pushHandler($this->get('monolog.handler.firephp'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.handler.debug' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Handler\DebugHandler A Symfony\Bridge\Monolog\Handler\DebugHandler instance.
     */
    protected function getMonolog_Handler_DebugService()
    {
        return $this->services['monolog.handler.debug'] = new \Symfony\Bridge\Monolog\Handler\DebugHandler(100, true);
    }

    /**
     * Gets the 'monolog.handler.firephp' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Handler\FirePHPHandler A Symfony\Bridge\Monolog\Handler\FirePHPHandler instance.
     */
    protected function getMonolog_Handler_FirephpService()
    {
        return $this->services['monolog.handler.firephp'] = new \Symfony\Bridge\Monolog\Handler\FirePHPHandler(200, true);
    }

    /**
     * Gets the 'monolog.handler.main' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Monolog\Handler\StreamHandler A Monolog\Handler\StreamHandler instance.
     */
    protected function getMonolog_Handler_MainService()
    {
        return $this->services['monolog.handler.main'] = new \Monolog\Handler\StreamHandler('/srv/civix/app/logs/dev.log', 100, true);
    }

    /**
     * Gets the 'monolog.handler.pushsender' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Monolog\Handler\StreamHandler A Monolog\Handler\StreamHandler instance.
     */
    protected function getMonolog_Handler_PushsenderService()
    {
        return $this->services['monolog.handler.pushsender'] = new \Monolog\Handler\StreamHandler('/srv/civix/app/logs/pushsender.log', 100, true);
    }

    /**
     * Gets the 'monolog.logger.deprecation' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_DeprecationService()
    {
        $this->services['monolog.logger.deprecation'] = $instance = new \Symfony\Bridge\Monolog\Logger('deprecation');

        $instance->pushHandler($this->get('monolog.handler.firephp'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.doctrine' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_DoctrineService()
    {
        $this->services['monolog.logger.doctrine'] = $instance = new \Symfony\Bridge\Monolog\Logger('doctrine');

        $instance->pushHandler($this->get('monolog.handler.firephp'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.emergency' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_EmergencyService()
    {
        $this->services['monolog.logger.emergency'] = $instance = new \Symfony\Bridge\Monolog\Logger('emergency');

        $instance->pushHandler($this->get('monolog.handler.firephp'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.event' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_EventService()
    {
        $this->services['monolog.logger.event'] = $instance = new \Symfony\Bridge\Monolog\Logger('event');

        $instance->pushHandler($this->get('monolog.handler.firephp'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.profiler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_ProfilerService()
    {
        $this->services['monolog.logger.profiler'] = $instance = new \Symfony\Bridge\Monolog\Logger('profiler');

        $instance->pushHandler($this->get('monolog.handler.firephp'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.pushsender' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_PushsenderService()
    {
        $this->services['monolog.logger.pushsender'] = $instance = new \Symfony\Bridge\Monolog\Logger('pushsender');

        $instance->pushHandler($this->get('monolog.handler.firephp'));
        $instance->pushHandler($this->get('monolog.handler.pushsender'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_RequestService()
    {
        $this->services['monolog.logger.request'] = $instance = new \Symfony\Bridge\Monolog\Logger('request');

        $instance->pushHandler($this->get('monolog.handler.firephp'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_RouterService()
    {
        $this->services['monolog.logger.router'] = $instance = new \Symfony\Bridge\Monolog\Logger('router');

        $instance->pushHandler($this->get('monolog.handler.firephp'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.security' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_SecurityService()
    {
        $this->services['monolog.logger.security'] = $instance = new \Symfony\Bridge\Monolog\Logger('security');

        $instance->pushHandler($this->get('monolog.handler.firephp'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.templating' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_TemplatingService()
    {
        $this->services['monolog.logger.templating'] = $instance = new \Symfony\Bridge\Monolog\Logger('templating');

        $instance->pushHandler($this->get('monolog.handler.firephp'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'mopa.form.date_extension' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Form\Extension\DateTypeExtension A Mopa\Bundle\BootstrapBundle\Form\Extension\DateTypeExtension instance.
     */
    protected function getMopa_Form_DateExtensionService()
    {
        return $this->services['mopa.form.date_extension'] = new \Mopa\Bundle\BootstrapBundle\Form\Extension\DateTypeExtension();
    }

    /**
     * Gets the 'mopa.form.error_type_extension' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Form\Extension\ErrorTypeFormTypeExtension A Mopa\Bundle\BootstrapBundle\Form\Extension\ErrorTypeFormTypeExtension instance.
     */
    protected function getMopa_Form_ErrorTypeExtensionService()
    {
        return $this->services['mopa.form.error_type_extension'] = new \Mopa\Bundle\BootstrapBundle\Form\Extension\ErrorTypeFormTypeExtension(array('error_type' => NULL));
    }

    /**
     * Gets the 'mopa.form.help_extension' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Form\Extension\HelpFormTypeExtension A Mopa\Bundle\BootstrapBundle\Form\Extension\HelpFormTypeExtension instance.
     */
    protected function getMopa_Form_HelpExtensionService()
    {
        return $this->services['mopa.form.help_extension'] = new \Mopa\Bundle\BootstrapBundle\Form\Extension\HelpFormTypeExtension(array('tooltip_icon' => 'icon-info-sign', 'tooltip_placement' => 'top'));
    }

    /**
     * Gets the 'mopa.form.hexcolor_type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Form\Type\HexColorType A Mopa\Bundle\BootstrapBundle\Form\Type\HexColorType instance.
     */
    protected function getMopa_Form_HexcolorTypeService()
    {
        return $this->services['mopa.form.hexcolor_type'] = new \Mopa\Bundle\BootstrapBundle\Form\Type\HexColorType();
    }

    /**
     * Gets the 'mopa.form.icon_button_extension' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Form\Extension\IconButtonExtension A Mopa\Bundle\BootstrapBundle\Form\Extension\IconButtonExtension instance.
     */
    protected function getMopa_Form_IconButtonExtensionService()
    {
        return $this->services['mopa.form.icon_button_extension'] = new \Mopa\Bundle\BootstrapBundle\Form\Extension\IconButtonExtension();
    }

    /**
     * Gets the 'mopa.form.legend_extension' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Form\Extension\LegendFormTypeExtension A Mopa\Bundle\BootstrapBundle\Form\Extension\LegendFormTypeExtension instance.
     */
    protected function getMopa_Form_LegendExtensionService()
    {
        return $this->services['mopa.form.legend_extension'] = new \Mopa\Bundle\BootstrapBundle\Form\Extension\LegendFormTypeExtension(array('render_fieldset' => true, 'show_legend' => true, 'show_child_legend' => false, 'render_required_asterisk' => false, 'render_optional_text' => true, 'errors_on_forms' => false));
    }

    /**
     * Gets the 'mopa.form.tab_type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Form\Type\TabType A Mopa\Bundle\BootstrapBundle\Form\Type\TabType instance.
     */
    protected function getMopa_Form_TabTypeService()
    {
        return $this->services['mopa.form.tab_type'] = new \Mopa\Bundle\BootstrapBundle\Form\Type\TabType();
    }

    /**
     * Gets the 'mopa.form.tabbed_extension' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Form\Extension\TabbedFormTypeExtension A Mopa\Bundle\BootstrapBundle\Form\Extension\TabbedFormTypeExtension instance.
     */
    protected function getMopa_Form_TabbedExtensionService()
    {
        return $this->services['mopa.form.tabbed_extension'] = new \Mopa\Bundle\BootstrapBundle\Form\Extension\TabbedFormTypeExtension($this->get('form.factory'), array('class' => 'nav nav-tabs'));
    }

    /**
     * Gets the 'mopa.form.widget_collection_extension' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Form\Extension\WidgetCollectionFormTypeExtension A Mopa\Bundle\BootstrapBundle\Form\Extension\WidgetCollectionFormTypeExtension instance.
     */
    protected function getMopa_Form_WidgetCollectionExtensionService()
    {
        return $this->services['mopa.form.widget_collection_extension'] = new \Mopa\Bundle\BootstrapBundle\Form\Extension\WidgetCollectionFormTypeExtension(array('render_collection_item' => true, 'widget_add_btn' => array('attr' => array('class' => 'btn'), 'icon' => NULL, 'icon_color' => NULL), 'widget_remove_btn' => array('attr' => array('class' => 'btn'), 'icon' => NULL, 'icon_color' => NULL)));
    }

    /**
     * Gets the 'mopa.form.widget_extension' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Form\Extension\WidgetFormTypeExtension A Mopa\Bundle\BootstrapBundle\Form\Extension\WidgetFormTypeExtension instance.
     */
    protected function getMopa_Form_WidgetExtensionService()
    {
        return $this->services['mopa.form.widget_extension'] = new \Mopa\Bundle\BootstrapBundle\Form\Extension\WidgetFormTypeExtension(array('checkbox_label' => 'both', 'bootstrap_version' => 'mopa_bootstrap.version'));
    }

    /**
     * Gets the 'mopa_bootstrap.navbar.twig.extension' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Navbar\Twig\NavbarExtension A Mopa\Bundle\BootstrapBundle\Navbar\Twig\NavbarExtension instance.
     */
    protected function getMopaBootstrap_Navbar_Twig_ExtensionService()
    {
        return $this->services['mopa_bootstrap.navbar.twig.extension'] = new \Mopa\Bundle\BootstrapBundle\Navbar\Twig\NavbarExtension($this->get('mopa_bootstrap.navbar_renderer'));
    }

    /**
     * Gets the 'mopa_bootstrap.navbar_renderer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Navbar\Renderer\NavbarRenderer A Mopa\Bundle\BootstrapBundle\Navbar\Renderer\NavbarRenderer instance.
     */
    protected function getMopaBootstrap_NavbarRendererService()
    {
        return $this->services['mopa_bootstrap.navbar_renderer'] = new \Mopa\Bundle\BootstrapBundle\Navbar\Renderer\NavbarRenderer($this, array('frontendNavbar' => 'civix_front.navbar', 'questionMenu' => 'civix_front.question', 'manageMenu' => 'civix_front.manage', 'microPetitionMenu' => 'civix_front.micro_petition', 'petitionMenu' => 'civix_front.petition', 'settingsMenu' => 'civix_front.settings', 'groupMemberMenu' => 'civix_front.group_members'));
    }

    /**
     * Gets the 'nelmio_api_doc.doc_comment_extractor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Util\DocCommentExtractor A Nelmio\ApiDocBundle\Util\DocCommentExtractor instance.
     */
    protected function getNelmioApiDoc_DocCommentExtractorService()
    {
        return $this->services['nelmio_api_doc.doc_comment_extractor'] = new \Nelmio\ApiDocBundle\Util\DocCommentExtractor();
    }

    /**
     * Gets the 'nelmio_api_doc.event_listener.request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\EventListener\RequestListener A Nelmio\ApiDocBundle\EventListener\RequestListener instance.
     */
    protected function getNelmioApiDoc_EventListener_RequestService()
    {
        return $this->services['nelmio_api_doc.event_listener.request'] = new \Nelmio\ApiDocBundle\EventListener\RequestListener($this->get('nelmio_api_doc.extractor.api_doc_extractor'), $this->get('nelmio_api_doc.formatter.html_formatter'), '_doc');
    }

    /**
     * Gets the 'nelmio_api_doc.extractor.api_doc_extractor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Extractor\ApiDocExtractor A Nelmio\ApiDocBundle\Extractor\ApiDocExtractor instance.
     */
    protected function getNelmioApiDoc_Extractor_ApiDocExtractorService()
    {
        $this->services['nelmio_api_doc.extractor.api_doc_extractor'] = $instance = new \Nelmio\ApiDocBundle\Extractor\ApiDocExtractor($this, $this->get('router'), $this->get('annotation_reader'), $this->get('nelmio_api_doc.doc_comment_extractor'), array(0 => new \Nelmio\ApiDocBundle\Extractor\Handler\FosRestHandler(), 1 => new \Nelmio\ApiDocBundle\Extractor\Handler\JmsSecurityExtraHandler(), 2 => new \Nelmio\ApiDocBundle\Extractor\Handler\SensioFrameworkExtraHandler()));

        $instance->addParser($this->get('nelmio_api_doc.parser.form_type_parser'));
        $instance->addParser($this->get('nelmio_api_doc.parser.jms_metadata_parser'));

        return $instance;
    }

    /**
     * Gets the 'nelmio_api_doc.form.extension.description_form_type_extension' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Form\Extension\DescriptionFormTypeExtension A Nelmio\ApiDocBundle\Form\Extension\DescriptionFormTypeExtension instance.
     */
    protected function getNelmioApiDoc_Form_Extension_DescriptionFormTypeExtensionService()
    {
        return $this->services['nelmio_api_doc.form.extension.description_form_type_extension'] = new \Nelmio\ApiDocBundle\Form\Extension\DescriptionFormTypeExtension();
    }

    /**
     * Gets the 'nelmio_api_doc.formatter.abstract_formatter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Formatter\AbstractFormatter A Nelmio\ApiDocBundle\Formatter\AbstractFormatter instance.
     */
    protected function getNelmioApiDoc_Formatter_AbstractFormatterService()
    {
        return $this->services['nelmio_api_doc.formatter.abstract_formatter'] = new \Nelmio\ApiDocBundle\Formatter\AbstractFormatter();
    }

    /**
     * Gets the 'nelmio_api_doc.formatter.html_formatter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Formatter\HtmlFormatter A Nelmio\ApiDocBundle\Formatter\HtmlFormatter instance.
     */
    protected function getNelmioApiDoc_Formatter_HtmlFormatterService()
    {
        $this->services['nelmio_api_doc.formatter.html_formatter'] = $instance = new \Nelmio\ApiDocBundle\Formatter\HtmlFormatter();

        $instance->setTemplatingEngine($this->get('templating'));
        $instance->setMotdTemplate('NelmioApiDocBundle::Components/motd.html.twig');
        $instance->setApiName('Civix API documentation');
        $instance->setEnableSandbox(true);
        $instance->setEndpoint(NULL);
        $instance->setRequestFormatMethod('format_param');
        $instance->setDefaultRequestFormat('json');
        $instance->setAcceptType('');
        $instance->setBodyFormat('form');
        $instance->setAuthentication(NULL);

        return $instance;
    }

    /**
     * Gets the 'nelmio_api_doc.formatter.markdown_formatter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Formatter\MarkdownFormatter A Nelmio\ApiDocBundle\Formatter\MarkdownFormatter instance.
     */
    protected function getNelmioApiDoc_Formatter_MarkdownFormatterService()
    {
        return $this->services['nelmio_api_doc.formatter.markdown_formatter'] = new \Nelmio\ApiDocBundle\Formatter\MarkdownFormatter();
    }

    /**
     * Gets the 'nelmio_api_doc.formatter.simple_formatter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Formatter\SimpleFormatter A Nelmio\ApiDocBundle\Formatter\SimpleFormatter instance.
     */
    protected function getNelmioApiDoc_Formatter_SimpleFormatterService()
    {
        return $this->services['nelmio_api_doc.formatter.simple_formatter'] = new \Nelmio\ApiDocBundle\Formatter\SimpleFormatter();
    }

    /**
     * Gets the 'nelmio_api_doc.parser.form_type_parser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Parser\FormTypeParser A Nelmio\ApiDocBundle\Parser\FormTypeParser instance.
     */
    protected function getNelmioApiDoc_Parser_FormTypeParserService()
    {
        return $this->services['nelmio_api_doc.parser.form_type_parser'] = new \Nelmio\ApiDocBundle\Parser\FormTypeParser($this->get('form.factory'));
    }

    /**
     * Gets the 'nelmio_api_doc.parser.jms_metadata_parser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Parser\JmsMetadataParser A Nelmio\ApiDocBundle\Parser\JmsMetadataParser instance.
     */
    protected function getNelmioApiDoc_Parser_JmsMetadataParserService()
    {
        return $this->services['nelmio_api_doc.parser.jms_metadata_parser'] = new \Nelmio\ApiDocBundle\Parser\JmsMetadataParser($this->get('jms_serializer.metadata_factory'), $this->get('jms_serializer.naming_strategy'), $this->get('nelmio_api_doc.doc_comment_extractor'));
    }

    /**
     * Gets the 'nelmio_api_doc.twig.extension.extra_markdown' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Twig\Extension\MarkdownExtension A Nelmio\ApiDocBundle\Twig\Extension\MarkdownExtension instance.
     */
    protected function getNelmioApiDoc_Twig_Extension_ExtraMarkdownService()
    {
        return $this->services['nelmio_api_doc.twig.extension.extra_markdown'] = new \Nelmio\ApiDocBundle\Twig\Extension\MarkdownExtension();
    }

    /**
     * Gets the 'old_sound_rabbit_mq.connection.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PhpAmqpLib\Connection\AMQPConnection A PhpAmqpLib\Connection\AMQPConnection instance.
     */
    protected function getOldSoundRabbitMq_Connection_DefaultService()
    {
        return $this->services['old_sound_rabbit_mq.connection.default'] = new \PhpAmqpLib\Connection\AMQPConnection('localhost', 5672, 'civix', 'civix', 'civix');
    }

    /**
     * Gets the 'old_sound_rabbit_mq.push_producer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \OldSound\RabbitMqBundle\RabbitMq\Producer A OldSound\RabbitMqBundle\RabbitMq\Producer instance.
     */
    protected function getOldSoundRabbitMq_PushProducerService()
    {
        $this->services['old_sound_rabbit_mq.push_producer'] = $instance = new \OldSound\RabbitMqBundle\RabbitMq\Producer($this->get('old_sound_rabbit_mq.connection.default'));

        $instance->setExchangeOptions(array('name' => 'push-sender', 'type' => 'direct', 'passive' => false, 'durable' => true, 'auto_delete' => false, 'internal' => false, 'nowait' => false, 'arguments' => NULL, 'ticket' => NULL));
        $instance->setQueueOptions(array('name' => NULL));

        return $instance;
    }

    /**
     * Gets the 'old_sound_rabbit_mq.push_queue_consumer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \OldSound\RabbitMqBundle\RabbitMq\Consumer A OldSound\RabbitMqBundle\RabbitMq\Consumer instance.
     */
    protected function getOldSoundRabbitMq_PushQueueConsumerService()
    {
        $this->services['old_sound_rabbit_mq.push_queue_consumer'] = $instance = new \OldSound\RabbitMqBundle\RabbitMq\Consumer($this->get('old_sound_rabbit_mq.connection.default'));

        $instance->setExchangeOptions(array('name' => 'push-queue', 'type' => 'direct', 'passive' => false, 'durable' => true, 'auto_delete' => false, 'internal' => false, 'nowait' => false, 'arguments' => NULL, 'ticket' => NULL));
        $instance->setQueueOptions(array('name' => 'push-queue', 'passive' => false, 'durable' => true, 'exclusive' => false, 'auto_delete' => false, 'nowait' => false, 'arguments' => NULL, 'ticket' => NULL, 'routing_keys' => array()));
        $instance->setCallback(array(0 => $this->get('civix_core.rabbit.push_test'), 1 => 'execute'));

        return $instance;
    }

    /**
     * Gets the 'old_sound_rabbit_mq.push_queue_producer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \OldSound\RabbitMqBundle\RabbitMq\Producer A OldSound\RabbitMqBundle\RabbitMq\Producer instance.
     */
    protected function getOldSoundRabbitMq_PushQueueProducerService()
    {
        $this->services['old_sound_rabbit_mq.push_queue_producer'] = $instance = new \OldSound\RabbitMqBundle\RabbitMq\Producer($this->get('old_sound_rabbit_mq.connection.default'));

        $instance->setExchangeOptions(array('name' => 'push-queue', 'type' => 'direct', 'passive' => false, 'durable' => true, 'auto_delete' => false, 'internal' => false, 'nowait' => false, 'arguments' => NULL, 'ticket' => NULL));
        $instance->setQueueOptions(array('name' => NULL));

        return $instance;
    }

    /**
     * Gets the 'profiler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Profiler\Profiler A Symfony\Component\HttpKernel\Profiler\Profiler instance.
     */
    protected function getProfilerService()
    {
        $a = $this->get('monolog.logger.profiler', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        $b = $this->get('kernel', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        $c = new \Symfony\Component\HttpKernel\DataCollector\ConfigDataCollector();
        if ($this->has('kernel')) {
            $c->setKernel($b);
        }

        $d = new \Doctrine\Bundle\DoctrineBundle\DataCollector\DoctrineDataCollector($this->get('doctrine'));
        $d->addLogger('default', $this->get('doctrine.dbal.logger.profiling.default'));

        $this->services['profiler'] = $instance = new \Symfony\Component\HttpKernel\Profiler\Profiler(new \Symfony\Component\HttpKernel\Profiler\FileProfilerStorage('file:/srv/civix/app/cache/dev/profiler', '', '', 86400), $a);

        $instance->add($c);
        $instance->add($this->get('data_collector.request'));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\ExceptionDataCollector());
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\EventDataCollector());
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\LoggerDataCollector($a));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\TimeDataCollector($b));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\MemoryDataCollector());
        $instance->add($this->get('data_collector.router'));
        $instance->add(new \Symfony\Bundle\SecurityBundle\DataCollector\SecurityDataCollector($this->get('security.context', ContainerInterface::NULL_ON_INVALID_REFERENCE)));
        $instance->add(new \Symfony\Bundle\SwiftmailerBundle\DataCollector\MessageDataCollector($this));
        $instance->add($d);

        return $instance;
    }

    /**
     * Gets the 'profiler_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ProfilerListener A Symfony\Component\HttpKernel\EventListener\ProfilerListener instance.
     */
    protected function getProfilerListenerService()
    {
        return $this->services['profiler_listener'] = new \Symfony\Component\HttpKernel\EventListener\ProfilerListener($this->get('profiler'), NULL, false, false);
    }

    /**
     * Gets the 'property_accessor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\PropertyAccess\PropertyAccessor A Symfony\Component\PropertyAccess\PropertyAccessor instance.
     */
    protected function getPropertyAccessorService()
    {
        return $this->services['property_accessor'] = new \Symfony\Component\PropertyAccess\PropertyAccessor();
    }

    /**
     * Gets the 'request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws RuntimeException always since this service is expected to be injected dynamically
     * @throws InactiveScopeException when the 'request' service is requested while the 'request' scope is not active
     */
    protected function getRequestService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('request', 'request');
        }

        throw new RuntimeException('You have requested a synthetic service ("request"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'response_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ResponseListener A Symfony\Component\HttpKernel\EventListener\ResponseListener instance.
     */
    protected function getResponseListenerService()
    {
        return $this->services['response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8');
    }

    /**
     * Gets the 'rms_push_notifications' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \RMS\PushNotificationsBundle\Service\Notifications A RMS\PushNotificationsBundle\Service\Notifications instance.
     */
    protected function getRmsPushNotificationsService()
    {
        return $this->services['rms_push_notifications'] = new \RMS\PushNotificationsBundle\Service\Notifications();
    }

    /**
     * Gets the 'router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Routing\Router A Symfony\Bundle\FrameworkBundle\Routing\Router instance.
     */
    protected function getRouterService()
    {
        return $this->services['router'] = new \Symfony\Bundle\FrameworkBundle\Routing\Router($this, '/srv/civix/app/config/routing_dev.yml', array('cache_dir' => '/srv/civix/app/cache/dev', 'debug' => true, 'generator_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator', 'generator_base_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator', 'generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\PhpGeneratorDumper', 'generator_cache_class' => 'appDevUrlGenerator', 'matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher', 'matcher_base_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher', 'matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\PhpMatcherDumper', 'matcher_cache_class' => 'appDevUrlMatcher', 'strict_requirements' => true), $this->get('router.request_context', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('monolog.logger.router', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'router_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\RouterListener A Symfony\Component\HttpKernel\EventListener\RouterListener instance.
     */
    protected function getRouterListenerService()
    {
        $this->services['router_listener'] = $instance = new \Symfony\Component\HttpKernel\EventListener\RouterListener($this->get('router'), $this->get('router.request_context', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('monolog.logger.request', ContainerInterface::NULL_ON_INVALID_REFERENCE));

        $instance->setRequest($this->get('request', ContainerInterface::NULL_ON_INVALID_REFERENCE));

        return $instance;
    }

    /**
     * Gets the 'routing.loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader A Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader instance.
     */
    protected function getRouting_LoaderService()
    {
        $a = $this->get('file_locator');
        $b = $this->get('annotation_reader');

        $c = new \Sensio\Bundle\FrameworkExtraBundle\Routing\AnnotatedRouteControllerLoader($b);

        $d = new \Symfony\Component\Config\Loader\LoaderResolver();
        $d->addLoader(new \Symfony\Component\Routing\Loader\XmlFileLoader($a));
        $d->addLoader(new \Symfony\Component\Routing\Loader\YamlFileLoader($a));
        $d->addLoader(new \Symfony\Component\Routing\Loader\PhpFileLoader($a));
        $d->addLoader(new \Symfony\Component\Routing\Loader\AnnotationDirectoryLoader($a, $c));
        $d->addLoader(new \Symfony\Component\Routing\Loader\AnnotationFileLoader($a, $c));
        $d->addLoader($c);

        return $this->services['routing.loader'] = new \Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader($this->get('controller_name_converter'), $this->get('monolog.logger.router', ContainerInterface::NULL_ON_INVALID_REFERENCE), $d);
    }

    /**
     * Gets the 'security.access.decision_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\SecurityExtraBundle\Security\Authorization\RememberingAccessDecisionManager A JMS\SecurityExtraBundle\Security\Authorization\RememberingAccessDecisionManager instance.
     */
    protected function getSecurity_Access_DecisionManagerService()
    {
        $a = new \JMS\SecurityExtraBundle\Security\Authorization\Expression\LazyLoadingExpressionVoter($this->get('security.expressions.handler'), $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        $a->setLazyCompiler($this, 'security.expressions.compiler');
        $a->setCacheDir('/srv/civix/app/cache/dev/jms_security/expressions');

        return $this->services['security.access.decision_manager'] = new \JMS\SecurityExtraBundle\Security\Authorization\RememberingAccessDecisionManager(new \Symfony\Component\Security\Core\Authorization\AccessDecisionManager(array(0 => $a, 1 => new \Symfony\Component\Security\Core\Authorization\Voter\RoleHierarchyVoter($this->get('security.role_hierarchy')), 2 => new \Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter($this->get('security.authentication.trust_resolver'))), 'affirmative', false, true));
    }

    /**
     * Gets the 'security.access.method_interceptor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\SecurityExtraBundle\Security\Authorization\Interception\MethodSecurityInterceptor A JMS\SecurityExtraBundle\Security\Authorization\Interception\MethodSecurityInterceptor instance.
     */
    protected function getSecurity_Access_MethodInterceptorService()
    {
        return $this->services['security.access.method_interceptor'] = new \JMS\SecurityExtraBundle\Security\Authorization\Interception\MethodSecurityInterceptor($this->get('security.context'), $this->get('security.authentication.manager'), $this->get('security.access.decision_manager'), new \JMS\SecurityExtraBundle\Security\Authorization\AfterInvocation\AfterInvocationManager(array()), new \JMS\SecurityExtraBundle\Security\Authorization\RunAsManager('RunAsToken', 'ROLE_'), $this->get('security.extra.metadata_factory'), $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'security.access.pointcut' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\SecurityExtraBundle\Security\Authorization\Interception\SecurityPointcut A JMS\SecurityExtraBundle\Security\Authorization\Interception\SecurityPointcut instance.
     */
    protected function getSecurity_Access_PointcutService()
    {
        $this->services['security.access.pointcut'] = $instance = new \JMS\SecurityExtraBundle\Security\Authorization\Interception\SecurityPointcut($this->get('security.extra.metadata_factory'), false, array());

        $instance->setSecuredClasses(array());

        return $instance;
    }

    /**
     * Gets the 'security.authentication.trust_resolver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver A Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver instance.
     */
    protected function getSecurity_Authentication_TrustResolverService()
    {
        return $this->services['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver('Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken', 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken');
    }

    /**
     * Gets the 'security.context' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Core\SecurityContext A Symfony\Component\Security\Core\SecurityContext instance.
     */
    protected function getSecurity_ContextService()
    {
        return $this->services['security.context'] = new \Symfony\Component\Security\Core\SecurityContext($this->get('security.authentication.manager'), $this->get('security.access.decision_manager'), false);
    }

    /**
     * Gets the 'security.encoder_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Core\Encoder\EncoderFactory A Symfony\Component\Security\Core\Encoder\EncoderFactory instance.
     */
    protected function getSecurity_EncoderFactoryService()
    {
        return $this->services['security.encoder_factory'] = new \Symfony\Component\Security\Core\Encoder\EncoderFactory(array('Civix\\CoreBundle\\Entity\\Representative' => array('class' => 'Symfony\\Component\\Security\\Core\\Encoder\\MessageDigestPasswordEncoder', 'arguments' => array(0 => 'sha512', 1 => false, 2 => 473)), 'Civix\\CoreBundle\\Entity\\Group' => array('class' => 'Symfony\\Component\\Security\\Core\\Encoder\\MessageDigestPasswordEncoder', 'arguments' => array(0 => 'sha512', 1 => false, 2 => 473)), 'Civix\\CoreBundle\\Entity\\Superuser' => array('class' => 'Symfony\\Component\\Security\\Core\\Encoder\\MessageDigestPasswordEncoder', 'arguments' => array(0 => 'sha512', 1 => false, 2 => 473)), 'Civix\\CoreBundle\\Entity\\User' => array('class' => 'Symfony\\Component\\Security\\Core\\Encoder\\MessageDigestPasswordEncoder', 'arguments' => array(0 => 'sha512', 1 => false, 2 => 473))));
    }

    /**
     * Gets the 'security.expressions.compiler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\SecurityExtraBundle\Security\Authorization\Expression\ExpressionCompiler A JMS\SecurityExtraBundle\Security\Authorization\Expression\ExpressionCompiler instance.
     */
    protected function getSecurity_Expressions_CompilerService()
    {
        $a = new \JMS\SecurityExtraBundle\Security\Authorization\Expression\Compiler\ContainerAwareVariableCompiler();
        $a->setMaps(array('trust_resolver' => 'security.authentication.trust_resolver', 'role_hierarchy' => 'security.role_hierarchy', 'permission_evaluator' => 'security.acl.permission_evaluator'), array());

        $this->services['security.expressions.compiler'] = $instance = new \JMS\SecurityExtraBundle\Security\Authorization\Expression\ExpressionCompiler();

        $instance->addFunctionCompiler(new \JMS\SecurityExtraBundle\Security\Acl\Expression\HasPermissionFunctionCompiler());
        $instance->addTypeCompiler(new \JMS\SecurityExtraBundle\Security\Authorization\Expression\Compiler\ParameterExpressionCompiler());
        $instance->addTypeCompiler($a);

        return $instance;
    }

    /**
     * Gets the 'security.expressions.reverse_interpreter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\SecurityExtraBundle\Security\Authorization\Expression\ReverseInterpreter A JMS\SecurityExtraBundle\Security\Authorization\Expression\ReverseInterpreter instance.
     */
    protected function getSecurity_Expressions_ReverseInterpreterService()
    {
        return $this->services['security.expressions.reverse_interpreter'] = new \JMS\SecurityExtraBundle\Security\Authorization\Expression\ReverseInterpreter($this->get('security.expressions.compiler'), $this->get('security.expressions.handler'));
    }

    /**
     * Gets the 'security.extra.metadata_driver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Metadata\Driver\DriverChain A Metadata\Driver\DriverChain instance.
     */
    protected function getSecurity_Extra_MetadataDriverService()
    {
        return $this->services['security.extra.metadata_driver'] = new \Metadata\Driver\DriverChain(array(0 => new \JMS\SecurityExtraBundle\Metadata\Driver\AnnotationDriver($this->get('annotation_reader'))));
    }

    /**
     * Gets the 'security.firewall' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Http\Firewall A Symfony\Component\Security\Http\Firewall instance.
     */
    protected function getSecurity_FirewallService()
    {
        return $this->services['security.firewall'] = new \Symfony\Component\Security\Http\Firewall(new \Symfony\Bundle\SecurityBundle\Security\FirewallMap($this, array('security.firewall.map.context.representative_login' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/representative/login$'), 'security.firewall.map.context.representative_registration' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/representative/registration$'), 'security.firewall.map.context.representative_security_area' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/representative/'), 'security.firewall.map.context.group_login' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/group/login$'), 'security.firewall.map.context.group_registration' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/group/registration$'), 'security.firewall.map.context.group_security_area' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/group/'), 'security.firewall.map.context.superuser_login' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/superuser/login$'), 'security.firewall.map.context.superuser_security_area' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/superuser/'), 'security.firewall.map.context.public_api' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/api-public/'), 'security.firewall.map.context.mobileuser_login' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/api/secure/login$'), 'security.firewall.map.context.mobileuser_registration' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/api/secure/registration$'), 'security.firewall.map.context.mobileuser_facebook_login' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/api/secure/facebook/login$'), 'security.firewall.map.context.mobileuser_facebook_registration' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/api/secure/registration-facebook$'), 'security.firewall.map.context.mobileuser_forgot_password' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/api/secure/forgot-password$'), 'security.firewall.map.context.mobileuser_reset_token' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/api/secure/resettoken/'), 'security.firewall.map.context.mobileuser_request_beta' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/api/secure/beta$'), 'security.firewall.map.context.mobileuser_security_area' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/api/'), 'security.firewall.map.context.leader_api_login' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/api-leader/sessions/$'), 'security.firewall.map.context.leader_api_secure_area' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/api-leader/'), 'security.firewall.map.context.other_area' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/'))), $this->get('event_dispatcher'));
    }

    /**
     * Gets the 'security.firewall.map.context.group_login' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_GroupLoginService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.group_login'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'group_login', $b, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)), 2 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '56902dad93d11', $b), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'group_login', NULL, NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.group_registration' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_GroupRegistrationService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.group_registration'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'group_registration', $b, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)), 2 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '56902dad93d11', $b), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'group_registration', NULL, NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.group_security_area' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_GroupSecurityAreaService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        $c = $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        $d = $this->get('security.http_utils');
        $e = $this->get('http_kernel');

        $f = new \Symfony\Component\Security\Http\Firewall\LogoutListener($a, $d, new \Symfony\Component\Security\Http\Logout\DefaultLogoutSuccessHandler($d, '/group'), array('csrf_parameter' => '_csrf_token', 'intention' => 'logout', 'logout_path' => '/group/logout'));
        $f->addHandler($this->get('security.logout.handler.session'));

        $g = new \Symfony\Component\Security\Http\Authentication\DefaultAuthenticationSuccessHandler($d, array('login_path' => '/group/login', 'always_use_default_target_path' => false, 'default_target_path' => '/', 'target_path_parameter' => '_target_path', 'use_referer' => false));
        $g->setProviderKey('group_security_area');

        return $this->services['security.firewall.map.context.group_security_area'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'group_security_area', $b, $c), 2 => $f, 3 => new \Symfony\Component\Security\Http\Firewall\UsernamePasswordFormAuthenticationListener($a, $this->get('security.authentication.manager'), $this->get('security.authentication.session_strategy'), $d, 'group_security_area', $g, new \Symfony\Component\Security\Http\Authentication\DefaultAuthenticationFailureHandler($e, $d, array('login_path' => '/group/login', 'failure_path' => NULL, 'failure_forward' => false, 'failure_path_parameter' => '_failure_path'), $b), array('check_path' => '/group/login_check', 'intention' => 'group_authentication', 'use_forward' => false, 'require_previous_session' => true, 'username_parameter' => '_username', 'password_parameter' => '_password', 'csrf_parameter' => '_csrf_token', 'post_only' => true), $b, $c, $this->get('form.csrf_provider')), 4 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $d, 'group_security_area', new \Symfony\Component\Security\Http\EntryPoint\FormAuthenticationEntryPoint($e, $d, '/group/login', false), NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.leader_api_login' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_LeaderApiLoginService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.leader_api_login'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'leader_api_login', $b, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)), 2 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '56902dad93d11', $b), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'leader_api_login', NULL, NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.leader_api_secure_area' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_LeaderApiSecureAreaService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.leader_api_secure_area'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'leader_api_secure_area', $b, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)), 2 => new \Civix\ApiBundle\Security\Firewall\HeaderAuthenticationListener($a, $this->get('security.authentication.manager')), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'leader_api_secure_area', NULL, NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.mobileuser_facebook_login' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_MobileuserFacebookLoginService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.mobileuser_facebook_login'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'mobileuser_facebook_login', $b, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)), 2 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '56902dad93d11', $b), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'mobileuser_facebook_login', NULL, NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.mobileuser_facebook_registration' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_MobileuserFacebookRegistrationService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.mobileuser_facebook_registration'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'mobileuser_facebook_registration', $b, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)), 2 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '56902dad93d11', $b), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'mobileuser_facebook_registration', NULL, NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.mobileuser_forgot_password' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_MobileuserForgotPasswordService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.mobileuser_forgot_password'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'mobileuser_forgot_password', $b, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)), 2 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '56902dad93d11', $b), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'mobileuser_forgot_password', NULL, NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.mobileuser_login' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_MobileuserLoginService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.mobileuser_login'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'mobileuser_login', $b, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)), 2 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '56902dad93d11', $b), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'mobileuser_login', NULL, NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.mobileuser_registration' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_MobileuserRegistrationService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.mobileuser_registration'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'mobileuser_registration', $b, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)), 2 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '56902dad93d11', $b), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'mobileuser_registration', NULL, NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.mobileuser_request_beta' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_MobileuserRequestBetaService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.mobileuser_request_beta'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'mobileuser_request_beta', $b, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)), 2 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '56902dad93d11', $b), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'mobileuser_request_beta', NULL, NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.mobileuser_reset_token' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_MobileuserResetTokenService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.mobileuser_reset_token'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'mobileuser_reset_token', $b, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)), 2 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '56902dad93d11', $b), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'mobileuser_reset_token', NULL, NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.mobileuser_security_area' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_MobileuserSecurityAreaService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.mobileuser_security_area'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'mobileuser_security_area', $b, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)), 2 => new \Civix\ApiBundle\Security\Firewall\HeaderAuthenticationListener($a, $this->get('security.authentication.manager')), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'mobileuser_security_area', NULL, NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.other_area' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_OtherAreaService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.other_area'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'other_area', $b, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)), 2 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '56902dad93d11', $b), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'other_area', NULL, NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.public_api' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_PublicApiService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.public_api'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'public_api', $b, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)), 2 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '56902dad93d11', $b), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'public_api', NULL, NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.representative_login' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_RepresentativeLoginService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.representative_login'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'representative_login', $b, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)), 2 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '56902dad93d11', $b), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'representative_login', NULL, NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.representative_registration' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_RepresentativeRegistrationService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.representative_registration'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'representative_registration', $b, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)), 2 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '56902dad93d11', $b), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'representative_registration', NULL, NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.representative_security_area' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_RepresentativeSecurityAreaService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        $c = $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        $d = $this->get('security.http_utils');
        $e = $this->get('http_kernel');

        $f = new \Symfony\Component\Security\Http\Firewall\LogoutListener($a, $d, new \Symfony\Component\Security\Http\Logout\DefaultLogoutSuccessHandler($d, '/representative'), array('csrf_parameter' => '_csrf_token', 'intention' => 'logout', 'logout_path' => '/representative/logout'));
        $f->addHandler($this->get('security.logout.handler.session'));

        $g = new \Symfony\Component\Security\Http\Authentication\DefaultAuthenticationSuccessHandler($d, array('login_path' => '/representative/login', 'always_use_default_target_path' => false, 'default_target_path' => '/', 'target_path_parameter' => '_target_path', 'use_referer' => false));
        $g->setProviderKey('representative_security_area');

        return $this->services['security.firewall.map.context.representative_security_area'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'representative_security_area', $b, $c), 2 => $f, 3 => new \Symfony\Component\Security\Http\Firewall\UsernamePasswordFormAuthenticationListener($a, $this->get('security.authentication.manager'), $this->get('security.authentication.session_strategy'), $d, 'representative_security_area', $g, new \Symfony\Component\Security\Http\Authentication\DefaultAuthenticationFailureHandler($e, $d, array('login_path' => '/representative/login', 'failure_path' => NULL, 'failure_forward' => false, 'failure_path_parameter' => '_failure_path'), $b), array('check_path' => '/representative/login_check', 'intention' => 'representative_authentication', 'use_forward' => false, 'require_previous_session' => true, 'username_parameter' => '_username', 'password_parameter' => '_password', 'csrf_parameter' => '_csrf_token', 'post_only' => true), $b, $c, $this->get('form.csrf_provider')), 4 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $d, 'representative_security_area', new \Symfony\Component\Security\Http\EntryPoint\FormAuthenticationEntryPoint($e, $d, '/representative/login', false), NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.superuser_login' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_SuperuserLoginService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.superuser_login'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'superuser_login', $b, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)), 2 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '56902dad93d11', $b), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'superuser_login', NULL, NULL, NULL, $b));
    }

    /**
     * Gets the 'security.firewall.map.context.superuser_security_area' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_SuperuserSecurityAreaService()
    {
        $a = $this->get('security.context');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        $c = $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        $d = $this->get('security.http_utils');
        $e = $this->get('http_kernel');

        $f = new \Symfony\Component\Security\Http\Firewall\LogoutListener($a, $d, new \Symfony\Component\Security\Http\Logout\DefaultLogoutSuccessHandler($d, '/superuser'), array('csrf_parameter' => '_csrf_token', 'intention' => 'logout', 'logout_path' => '/superuser/logout'));
        $f->addHandler($this->get('security.logout.handler.session'));

        $g = new \Symfony\Component\Security\Http\Authentication\DefaultAuthenticationSuccessHandler($d, array('login_path' => '/superuser/login', 'always_use_default_target_path' => false, 'default_target_path' => '/', 'target_path_parameter' => '_target_path', 'use_referer' => false));
        $g->setProviderKey('superuser_security_area');

        return $this->services['security.firewall.map.context.superuser_security_area'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('security.user.provider.concrete.representative'), 1 => $this->get('security.user.provider.concrete.group'), 2 => $this->get('security.user.provider.concrete.superuser'), 3 => $this->get('security.user.provider.concrete.mobileuser')), 'superuser_security_area', $b, $c), 2 => $f, 3 => new \Symfony\Component\Security\Http\Firewall\UsernamePasswordFormAuthenticationListener($a, $this->get('security.authentication.manager'), $this->get('security.authentication.session_strategy'), $d, 'superuser_security_area', $g, new \Symfony\Component\Security\Http\Authentication\DefaultAuthenticationFailureHandler($e, $d, array('login_path' => '/superuser/login', 'failure_path' => NULL, 'failure_forward' => false, 'failure_path_parameter' => '_failure_path'), $b), array('check_path' => '/superuser/login_check', 'intention' => 'superuser_authentication', 'use_forward' => false, 'require_previous_session' => true, 'username_parameter' => '_username', 'password_parameter' => '_password', 'csrf_parameter' => '_csrf_token', 'post_only' => true), $b, $c, $this->get('form.csrf_provider')), 4 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $d, 'superuser_security_area', new \Symfony\Component\Security\Http\EntryPoint\FormAuthenticationEntryPoint($e, $d, '/superuser/login', false), NULL, NULL, $b));
    }

    /**
     * Gets the 'security.rememberme.response_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Http\RememberMe\ResponseListener A Symfony\Component\Security\Http\RememberMe\ResponseListener instance.
     */
    protected function getSecurity_Rememberme_ResponseListenerService()
    {
        return $this->services['security.rememberme.response_listener'] = new \Symfony\Component\Security\Http\RememberMe\ResponseListener();
    }

    /**
     * Gets the 'security.role_hierarchy' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Core\Role\RoleHierarchy A Symfony\Component\Security\Core\Role\RoleHierarchy instance.
     */
    protected function getSecurity_RoleHierarchyService()
    {
        return $this->services['security.role_hierarchy'] = new \Symfony\Component\Security\Core\Role\RoleHierarchy(array());
    }

    /**
     * Gets the 'security.secure_random' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Core\Util\SecureRandom A Symfony\Component\Security\Core\Util\SecureRandom instance.
     */
    protected function getSecurity_SecureRandomService()
    {
        return $this->services['security.secure_random'] = new \Symfony\Component\Security\Core\Util\SecureRandom('/srv/civix/app/cache/dev/secure_random.seed', $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'security.validator.user_password' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Core\Validator\Constraints\UserPasswordValidator A Symfony\Component\Security\Core\Validator\Constraints\UserPasswordValidator instance.
     */
    protected function getSecurity_Validator_UserPasswordService()
    {
        return $this->services['security.validator.user_password'] = new \Symfony\Component\Security\Core\Validator\Constraints\UserPasswordValidator($this->get('security.context'), $this->get('security.encoder_factory'));
    }

    /**
     * Gets the 'sensio_distribution.webconfigurator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\DistributionBundle\Configurator\Configurator A Sensio\Bundle\DistributionBundle\Configurator\Configurator instance.
     */
    protected function getSensioDistribution_WebconfiguratorService()
    {
        return $this->services['sensio_distribution.webconfigurator'] = new \Sensio\Bundle\DistributionBundle\Configurator\Configurator('/srv/civix/app');
    }

    /**
     * Gets the 'sensio_framework_extra.cache.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\CacheListener A Sensio\Bundle\FrameworkExtraBundle\EventListener\CacheListener instance.
     */
    protected function getSensioFrameworkExtra_Cache_ListenerService()
    {
        return $this->services['sensio_framework_extra.cache.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\CacheListener();
    }

    /**
     * Gets the 'sensio_framework_extra.controller.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener A Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener instance.
     */
    protected function getSensioFrameworkExtra_Controller_ListenerService()
    {
        return $this->services['sensio_framework_extra.controller.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener($this->get('annotation_reader'));
    }

    /**
     * Gets the 'sensio_framework_extra.converter.datetime' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter A Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter instance.
     */
    protected function getSensioFrameworkExtra_Converter_DatetimeService()
    {
        return $this->services['sensio_framework_extra.converter.datetime'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter();
    }

    /**
     * Gets the 'sensio_framework_extra.converter.doctrine.orm' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter A Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter instance.
     */
    protected function getSensioFrameworkExtra_Converter_Doctrine_OrmService()
    {
        return $this->services['sensio_framework_extra.converter.doctrine.orm'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter($this->get('doctrine', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'sensio_framework_extra.converter.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener A Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener instance.
     */
    protected function getSensioFrameworkExtra_Converter_ListenerService()
    {
        return $this->services['sensio_framework_extra.converter.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener($this->get('sensio_framework_extra.converter.manager'));
    }

    /**
     * Gets the 'sensio_framework_extra.converter.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager A Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager instance.
     */
    protected function getSensioFrameworkExtra_Converter_ManagerService()
    {
        $this->services['sensio_framework_extra.converter.manager'] = $instance = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager();

        $instance->add($this->get('sensio_framework_extra.converter.doctrine.orm'), 0, 'doctrine.orm');
        $instance->add($this->get('sensio_framework_extra.converter.datetime'), 0, 'datetime');
        $instance->add($this->get('civix_core.comment_model_param_converter'), -100, NULL);
        $instance->add($this->get('civix_core.answer_model_param_converter'), -100, NULL);

        return $instance;
    }

    /**
     * Gets the 'sensio_framework_extra.view.guesser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\Templating\TemplateGuesser A Sensio\Bundle\FrameworkExtraBundle\Templating\TemplateGuesser instance.
     */
    protected function getSensioFrameworkExtra_View_GuesserService()
    {
        return $this->services['sensio_framework_extra.view.guesser'] = new \Sensio\Bundle\FrameworkExtraBundle\Templating\TemplateGuesser($this->get('kernel'));
    }

    /**
     * Gets the 'sensio_framework_extra.view.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener A Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener instance.
     */
    protected function getSensioFrameworkExtra_View_ListenerService()
    {
        return $this->services['sensio_framework_extra.view.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener($this);
    }

    /**
     * Gets the 'service_container' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws RuntimeException always since this service is expected to be injected dynamically
     */
    protected function getServiceContainerService()
    {
        throw new RuntimeException('You have requested a synthetic service ("service_container"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'session' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpFoundation\Session\Session A Symfony\Component\HttpFoundation\Session\Session instance.
     */
    protected function getSessionService()
    {
        return $this->services['session'] = new \Symfony\Component\HttpFoundation\Session\Session($this->get('session.storage.native'), new \Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag(), new \Symfony\Component\HttpFoundation\Session\Flash\FlashBag());
    }

    /**
     * Gets the 'session.handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpFoundation\Session\Storage\Handler\NativeFileSessionHandler A Symfony\Component\HttpFoundation\Session\Storage\Handler\NativeFileSessionHandler instance.
     */
    protected function getSession_HandlerService()
    {
        return $this->services['session.handler'] = new \Symfony\Component\HttpFoundation\Session\Storage\Handler\NativeFileSessionHandler('/srv/civix/app/cache/dev/sessions');
    }

    /**
     * Gets the 'session.storage.filesystem' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpFoundation\Session\Storage\MockFileSessionStorage A Symfony\Component\HttpFoundation\Session\Storage\MockFileSessionStorage instance.
     */
    protected function getSession_Storage_FilesystemService()
    {
        return $this->services['session.storage.filesystem'] = new \Symfony\Component\HttpFoundation\Session\Storage\MockFileSessionStorage('/srv/civix/app/cache/dev/sessions');
    }

    /**
     * Gets the 'session.storage.native' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage A Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage instance.
     */
    protected function getSession_Storage_NativeService()
    {
        return $this->services['session.storage.native'] = new \Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage(array(), $this->get('session.handler'));
    }

    /**
     * Gets the 'session.storage.php_bridge' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpFoundation\Session\Storage\PhpBridgeSessionStorage A Symfony\Component\HttpFoundation\Session\Storage\PhpBridgeSessionStorage instance.
     */
    protected function getSession_Storage_PhpBridgeService()
    {
        return $this->services['session.storage.php_bridge'] = new \Symfony\Component\HttpFoundation\Session\Storage\PhpBridgeSessionStorage($this->get('session.handler'));
    }

    /**
     * Gets the 'session_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\EventListener\SessionListener A Symfony\Bundle\FrameworkBundle\EventListener\SessionListener instance.
     */
    protected function getSessionListenerService()
    {
        return $this->services['session_listener'] = new \Symfony\Bundle\FrameworkBundle\EventListener\SessionListener($this);
    }

    /**
     * Gets the 'streamed_response_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener A Symfony\Component\HttpKernel\EventListener\StreamedResponseListener instance.
     */
    protected function getStreamedResponseListenerService()
    {
        return $this->services['streamed_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener();
    }

    /**
     * Gets the 'swiftmailer.email_sender.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SwiftmailerBundle\EventListener\EmailSenderListener A Symfony\Bundle\SwiftmailerBundle\EventListener\EmailSenderListener instance.
     */
    protected function getSwiftmailer_EmailSender_ListenerService()
    {
        return $this->services['swiftmailer.email_sender.listener'] = new \Symfony\Bundle\SwiftmailerBundle\EventListener\EmailSenderListener($this, $this->get('logger', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'swiftmailer.mailer.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Swift_Mailer A Swift_Mailer instance.
     */
    protected function getSwiftmailer_Mailer_DefaultService()
    {
        return $this->services['swiftmailer.mailer.default'] = new \Swift_Mailer($this->get('swiftmailer.mailer.default.transport'));
    }

    /**
     * Gets the 'swiftmailer.mailer.default.plugin.messagelogger' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Swift_Plugins_MessageLogger A Swift_Plugins_MessageLogger instance.
     */
    protected function getSwiftmailer_Mailer_Default_Plugin_MessageloggerService()
    {
        return $this->services['swiftmailer.mailer.default.plugin.messagelogger'] = new \Swift_Plugins_MessageLogger();
    }

    /**
     * Gets the 'swiftmailer.mailer.default.spool' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Swift_MemorySpool A Swift_MemorySpool instance.
     */
    protected function getSwiftmailer_Mailer_Default_SpoolService()
    {
        return $this->services['swiftmailer.mailer.default.spool'] = new \Swift_MemorySpool();
    }

    /**
     * Gets the 'swiftmailer.mailer.default.transport' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Swift_Transport_SpoolTransport A Swift_Transport_SpoolTransport instance.
     */
    protected function getSwiftmailer_Mailer_Default_TransportService()
    {
        $this->services['swiftmailer.mailer.default.transport'] = $instance = new \Swift_Transport_SpoolTransport($this->get('swiftmailer.mailer.default.transport.eventdispatcher'), $this->get('swiftmailer.mailer.default.spool'));

        $instance->registerPlugin($this->get('swiftmailer.mailer.default.plugin.messagelogger'));

        return $instance;
    }

    /**
     * Gets the 'swiftmailer.mailer.default.transport.real' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Swift_Transport_EsmtpTransport A Swift_Transport_EsmtpTransport instance.
     */
    protected function getSwiftmailer_Mailer_Default_Transport_RealService()
    {
        $a = new \Swift_Transport_Esmtp_AuthHandler(array(0 => new \Swift_Transport_Esmtp_Auth_CramMd5Authenticator(), 1 => new \Swift_Transport_Esmtp_Auth_LoginAuthenticator(), 2 => new \Swift_Transport_Esmtp_Auth_PlainAuthenticator()));
        $a->setUsername('AKIAIR3T4SCMIWOTAOWA');
        $a->setPassword('Ap3rzxOaji8sJUduNAp1+yQf3jTFXudxsivCg/S760lE');
        $a->setAuthMode(NULL);

        $this->services['swiftmailer.mailer.default.transport.real'] = $instance = new \Swift_Transport_EsmtpTransport(new \Swift_Transport_StreamBuffer(new \Swift_StreamFilters_StringReplacementFilterFactory()), array(0 => $a), $this->get('swiftmailer.mailer.default.transport.eventdispatcher'));

        $instance->setHost('email-smtp.us-east-1.amazonaws.com');
        $instance->setPort(25);
        $instance->setEncryption('tls');
        $instance->setTimeout(30);
        $instance->setSourceIp(NULL);

        return $instance;
    }

    /**
     * Gets the 'templating' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\TwigBundle\Debug\TimedTwigEngine A Symfony\Bundle\TwigBundle\Debug\TimedTwigEngine instance.
     */
    protected function getTemplatingService()
    {
        $this->services['templating'] = $instance = new \Symfony\Bundle\TwigBundle\Debug\TimedTwigEngine($this->get('twig'), $this->get('templating.name_parser'), $this->get('templating.locator'), $this->get('debug.stopwatch'));

        $instance->setDefaultEscapingStrategy(array(0 => $instance, 1 => 'guessDefaultEscapingStrategy'));

        return $instance;
    }

    /**
     * Gets the 'templating.asset.package_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\Asset\PackageFactory A Symfony\Bundle\FrameworkBundle\Templating\Asset\PackageFactory instance.
     */
    protected function getTemplating_Asset_PackageFactoryService()
    {
        return $this->services['templating.asset.package_factory'] = new \Symfony\Bundle\FrameworkBundle\Templating\Asset\PackageFactory($this);
    }

    /**
     * Gets the 'templating.filename_parser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\TemplateFilenameParser A Symfony\Bundle\FrameworkBundle\Templating\TemplateFilenameParser instance.
     */
    protected function getTemplating_FilenameParserService()
    {
        return $this->services['templating.filename_parser'] = new \Symfony\Bundle\FrameworkBundle\Templating\TemplateFilenameParser();
    }

    /**
     * Gets the 'templating.globals' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\GlobalVariables A Symfony\Bundle\FrameworkBundle\Templating\GlobalVariables instance.
     */
    protected function getTemplating_GlobalsService()
    {
        return $this->services['templating.globals'] = new \Symfony\Bundle\FrameworkBundle\Templating\GlobalVariables($this);
    }

    /**
     * Gets the 'templating.helper.actions' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\Helper\ActionsHelper A Symfony\Bundle\FrameworkBundle\Templating\Helper\ActionsHelper instance.
     */
    protected function getTemplating_Helper_ActionsService()
    {
        return $this->services['templating.helper.actions'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\ActionsHelper($this->get('fragment.handler'));
    }

    /**
     * Gets the 'templating.helper.assets' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Templating\Helper\CoreAssetsHelper A Symfony\Component\Templating\Helper\CoreAssetsHelper instance.
     * 
     * @throws InactiveScopeException when the 'templating.helper.assets' service is requested while the 'request' scope is not active
     */
    protected function getTemplating_Helper_AssetsService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('templating.helper.assets', 'request');
        }

        return $this->services['templating.helper.assets'] = $this->scopedServices['request']['templating.helper.assets'] = new \Symfony\Component\Templating\Helper\CoreAssetsHelper(new \Symfony\Bundle\FrameworkBundle\Templating\Asset\PathPackage($this->get('request'), NULL, '%s?%s'), array());
    }

    /**
     * Gets the 'templating.helper.code' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\Helper\CodeHelper A Symfony\Bundle\FrameworkBundle\Templating\Helper\CodeHelper instance.
     */
    protected function getTemplating_Helper_CodeService()
    {
        return $this->services['templating.helper.code'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\CodeHelper(NULL, '/srv/civix/app', 'UTF-8');
    }

    /**
     * Gets the 'templating.helper.form' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper A Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper instance.
     */
    protected function getTemplating_Helper_FormService()
    {
        return $this->services['templating.helper.form'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper(new \Symfony\Component\Form\FormRenderer(new \Symfony\Component\Form\Extension\Templating\TemplatingRendererEngine($this->get('debug.templating.engine.php'), array(0 => 'FrameworkBundle:Form')), $this->get('form.csrf_provider', ContainerInterface::NULL_ON_INVALID_REFERENCE)));
    }

    /**
     * Gets the 'templating.helper.logout_url' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Templating\Helper\LogoutUrlHelper A Symfony\Bundle\SecurityBundle\Templating\Helper\LogoutUrlHelper instance.
     */
    protected function getTemplating_Helper_LogoutUrlService()
    {
        $this->services['templating.helper.logout_url'] = $instance = new \Symfony\Bundle\SecurityBundle\Templating\Helper\LogoutUrlHelper($this, $this->get('router'));

        $instance->registerListener('representative_security_area', '/representative/logout', 'logout', '_csrf_token', NULL);
        $instance->registerListener('group_security_area', '/group/logout', 'logout', '_csrf_token', NULL);
        $instance->registerListener('superuser_security_area', '/superuser/logout', 'logout', '_csrf_token', NULL);

        return $instance;
    }

    /**
     * Gets the 'templating.helper.request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\Helper\RequestHelper A Symfony\Bundle\FrameworkBundle\Templating\Helper\RequestHelper instance.
     */
    protected function getTemplating_Helper_RequestService()
    {
        return $this->services['templating.helper.request'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\RequestHelper($this->get('request'));
    }

    /**
     * Gets the 'templating.helper.router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper A Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper instance.
     */
    protected function getTemplating_Helper_RouterService()
    {
        return $this->services['templating.helper.router'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper($this->get('router'));
    }

    /**
     * Gets the 'templating.helper.security' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Templating\Helper\SecurityHelper A Symfony\Bundle\SecurityBundle\Templating\Helper\SecurityHelper instance.
     */
    protected function getTemplating_Helper_SecurityService()
    {
        return $this->services['templating.helper.security'] = new \Symfony\Bundle\SecurityBundle\Templating\Helper\SecurityHelper($this->get('security.context', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'templating.helper.session' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\Helper\SessionHelper A Symfony\Bundle\FrameworkBundle\Templating\Helper\SessionHelper instance.
     */
    protected function getTemplating_Helper_SessionService()
    {
        return $this->services['templating.helper.session'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\SessionHelper($this->get('request'));
    }

    /**
     * Gets the 'templating.helper.slots' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Templating\Helper\SlotsHelper A Symfony\Component\Templating\Helper\SlotsHelper instance.
     */
    protected function getTemplating_Helper_SlotsService()
    {
        return $this->services['templating.helper.slots'] = new \Symfony\Component\Templating\Helper\SlotsHelper();
    }

    /**
     * Gets the 'templating.helper.translator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\Helper\TranslatorHelper A Symfony\Bundle\FrameworkBundle\Templating\Helper\TranslatorHelper instance.
     */
    protected function getTemplating_Helper_TranslatorService()
    {
        return $this->services['templating.helper.translator'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\TranslatorHelper($this->get('translator'));
    }

    /**
     * Gets the 'templating.loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\Loader\FilesystemLoader A Symfony\Bundle\FrameworkBundle\Templating\Loader\FilesystemLoader instance.
     */
    protected function getTemplating_LoaderService()
    {
        return $this->services['templating.loader'] = new \Symfony\Bundle\FrameworkBundle\Templating\Loader\FilesystemLoader($this->get('templating.locator'));
    }

    /**
     * Gets the 'templating.name_parser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser A Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser instance.
     */
    protected function getTemplating_NameParserService()
    {
        return $this->services['templating.name_parser'] = new \Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser($this->get('kernel'));
    }

    /**
     * Gets the 'translation.dumper.csv' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\CsvFileDumper A Symfony\Component\Translation\Dumper\CsvFileDumper instance.
     */
    protected function getTranslation_Dumper_CsvService()
    {
        return $this->services['translation.dumper.csv'] = new \Symfony\Component\Translation\Dumper\CsvFileDumper();
    }

    /**
     * Gets the 'translation.dumper.ini' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\IniFileDumper A Symfony\Component\Translation\Dumper\IniFileDumper instance.
     */
    protected function getTranslation_Dumper_IniService()
    {
        return $this->services['translation.dumper.ini'] = new \Symfony\Component\Translation\Dumper\IniFileDumper();
    }

    /**
     * Gets the 'translation.dumper.mo' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\MoFileDumper A Symfony\Component\Translation\Dumper\MoFileDumper instance.
     */
    protected function getTranslation_Dumper_MoService()
    {
        return $this->services['translation.dumper.mo'] = new \Symfony\Component\Translation\Dumper\MoFileDumper();
    }

    /**
     * Gets the 'translation.dumper.php' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\PhpFileDumper A Symfony\Component\Translation\Dumper\PhpFileDumper instance.
     */
    protected function getTranslation_Dumper_PhpService()
    {
        return $this->services['translation.dumper.php'] = new \Symfony\Component\Translation\Dumper\PhpFileDumper();
    }

    /**
     * Gets the 'translation.dumper.po' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\PoFileDumper A Symfony\Component\Translation\Dumper\PoFileDumper instance.
     */
    protected function getTranslation_Dumper_PoService()
    {
        return $this->services['translation.dumper.po'] = new \Symfony\Component\Translation\Dumper\PoFileDumper();
    }

    /**
     * Gets the 'translation.dumper.qt' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\QtFileDumper A Symfony\Component\Translation\Dumper\QtFileDumper instance.
     */
    protected function getTranslation_Dumper_QtService()
    {
        return $this->services['translation.dumper.qt'] = new \Symfony\Component\Translation\Dumper\QtFileDumper();
    }

    /**
     * Gets the 'translation.dumper.res' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\IcuResFileDumper A Symfony\Component\Translation\Dumper\IcuResFileDumper instance.
     */
    protected function getTranslation_Dumper_ResService()
    {
        return $this->services['translation.dumper.res'] = new \Symfony\Component\Translation\Dumper\IcuResFileDumper();
    }

    /**
     * Gets the 'translation.dumper.xliff' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\XliffFileDumper A Symfony\Component\Translation\Dumper\XliffFileDumper instance.
     */
    protected function getTranslation_Dumper_XliffService()
    {
        return $this->services['translation.dumper.xliff'] = new \Symfony\Component\Translation\Dumper\XliffFileDumper();
    }

    /**
     * Gets the 'translation.dumper.yml' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\YamlFileDumper A Symfony\Component\Translation\Dumper\YamlFileDumper instance.
     */
    protected function getTranslation_Dumper_YmlService()
    {
        return $this->services['translation.dumper.yml'] = new \Symfony\Component\Translation\Dumper\YamlFileDumper();
    }

    /**
     * Gets the 'translation.extractor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Extractor\ChainExtractor A Symfony\Component\Translation\Extractor\ChainExtractor instance.
     */
    protected function getTranslation_ExtractorService()
    {
        $this->services['translation.extractor'] = $instance = new \Symfony\Component\Translation\Extractor\ChainExtractor();

        $instance->addExtractor('php', $this->get('translation.extractor.php'));
        $instance->addExtractor('twig', $this->get('twig.translation.extractor'));

        return $instance;
    }

    /**
     * Gets the 'translation.extractor.php' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Translation\PhpExtractor A Symfony\Bundle\FrameworkBundle\Translation\PhpExtractor instance.
     */
    protected function getTranslation_Extractor_PhpService()
    {
        return $this->services['translation.extractor.php'] = new \Symfony\Bundle\FrameworkBundle\Translation\PhpExtractor();
    }

    /**
     * Gets the 'translation.loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Translation\TranslationLoader A Symfony\Bundle\FrameworkBundle\Translation\TranslationLoader instance.
     */
    protected function getTranslation_LoaderService()
    {
        $a = $this->get('translation.loader.xliff');

        $this->services['translation.loader'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\TranslationLoader();

        $instance->addLoader('php', $this->get('translation.loader.php'));
        $instance->addLoader('yml', $this->get('translation.loader.yml'));
        $instance->addLoader('xlf', $a);
        $instance->addLoader('xliff', $a);
        $instance->addLoader('po', $this->get('translation.loader.po'));
        $instance->addLoader('mo', $this->get('translation.loader.mo'));
        $instance->addLoader('ts', $this->get('translation.loader.qt'));
        $instance->addLoader('csv', $this->get('translation.loader.csv'));
        $instance->addLoader('res', $this->get('translation.loader.res'));
        $instance->addLoader('dat', $this->get('translation.loader.dat'));
        $instance->addLoader('ini', $this->get('translation.loader.ini'));

        return $instance;
    }

    /**
     * Gets the 'translation.loader.csv' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\CsvFileLoader A Symfony\Component\Translation\Loader\CsvFileLoader instance.
     */
    protected function getTranslation_Loader_CsvService()
    {
        return $this->services['translation.loader.csv'] = new \Symfony\Component\Translation\Loader\CsvFileLoader();
    }

    /**
     * Gets the 'translation.loader.dat' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\IcuDatFileLoader A Symfony\Component\Translation\Loader\IcuDatFileLoader instance.
     */
    protected function getTranslation_Loader_DatService()
    {
        return $this->services['translation.loader.dat'] = new \Symfony\Component\Translation\Loader\IcuDatFileLoader();
    }

    /**
     * Gets the 'translation.loader.ini' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\IniFileLoader A Symfony\Component\Translation\Loader\IniFileLoader instance.
     */
    protected function getTranslation_Loader_IniService()
    {
        return $this->services['translation.loader.ini'] = new \Symfony\Component\Translation\Loader\IniFileLoader();
    }

    /**
     * Gets the 'translation.loader.mo' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\MoFileLoader A Symfony\Component\Translation\Loader\MoFileLoader instance.
     */
    protected function getTranslation_Loader_MoService()
    {
        return $this->services['translation.loader.mo'] = new \Symfony\Component\Translation\Loader\MoFileLoader();
    }

    /**
     * Gets the 'translation.loader.php' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\PhpFileLoader A Symfony\Component\Translation\Loader\PhpFileLoader instance.
     */
    protected function getTranslation_Loader_PhpService()
    {
        return $this->services['translation.loader.php'] = new \Symfony\Component\Translation\Loader\PhpFileLoader();
    }

    /**
     * Gets the 'translation.loader.po' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\PoFileLoader A Symfony\Component\Translation\Loader\PoFileLoader instance.
     */
    protected function getTranslation_Loader_PoService()
    {
        return $this->services['translation.loader.po'] = new \Symfony\Component\Translation\Loader\PoFileLoader();
    }

    /**
     * Gets the 'translation.loader.qt' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\QtFileLoader A Symfony\Component\Translation\Loader\QtFileLoader instance.
     */
    protected function getTranslation_Loader_QtService()
    {
        return $this->services['translation.loader.qt'] = new \Symfony\Component\Translation\Loader\QtFileLoader();
    }

    /**
     * Gets the 'translation.loader.res' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\IcuResFileLoader A Symfony\Component\Translation\Loader\IcuResFileLoader instance.
     */
    protected function getTranslation_Loader_ResService()
    {
        return $this->services['translation.loader.res'] = new \Symfony\Component\Translation\Loader\IcuResFileLoader();
    }

    /**
     * Gets the 'translation.loader.xliff' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\XliffFileLoader A Symfony\Component\Translation\Loader\XliffFileLoader instance.
     */
    protected function getTranslation_Loader_XliffService()
    {
        return $this->services['translation.loader.xliff'] = new \Symfony\Component\Translation\Loader\XliffFileLoader();
    }

    /**
     * Gets the 'translation.loader.yml' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\YamlFileLoader A Symfony\Component\Translation\Loader\YamlFileLoader instance.
     */
    protected function getTranslation_Loader_YmlService()
    {
        return $this->services['translation.loader.yml'] = new \Symfony\Component\Translation\Loader\YamlFileLoader();
    }

    /**
     * Gets the 'translation.writer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Writer\TranslationWriter A Symfony\Component\Translation\Writer\TranslationWriter instance.
     */
    protected function getTranslation_WriterService()
    {
        $this->services['translation.writer'] = $instance = new \Symfony\Component\Translation\Writer\TranslationWriter();

        $instance->addDumper('php', $this->get('translation.dumper.php'));
        $instance->addDumper('xlf', $this->get('translation.dumper.xliff'));
        $instance->addDumper('po', $this->get('translation.dumper.po'));
        $instance->addDumper('mo', $this->get('translation.dumper.mo'));
        $instance->addDumper('yml', $this->get('translation.dumper.yml'));
        $instance->addDumper('ts', $this->get('translation.dumper.qt'));
        $instance->addDumper('csv', $this->get('translation.dumper.csv'));
        $instance->addDumper('ini', $this->get('translation.dumper.ini'));
        $instance->addDumper('res', $this->get('translation.dumper.res'));

        return $instance;
    }

    /**
     * Gets the 'translator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\IdentityTranslator A Symfony\Component\Translation\IdentityTranslator instance.
     */
    protected function getTranslatorService()
    {
        return $this->services['translator'] = new \Symfony\Component\Translation\IdentityTranslator($this->get('translator.selector'));
    }

    /**
     * Gets the 'translator.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Translation\Translator A Symfony\Bundle\FrameworkBundle\Translation\Translator instance.
     */
    protected function getTranslator_DefaultService()
    {
        return $this->services['translator.default'] = new \Symfony\Bundle\FrameworkBundle\Translation\Translator($this, $this->get('translator.selector'), array('translation.loader.php' => array(0 => 'php'), 'translation.loader.yml' => array(0 => 'yml'), 'translation.loader.xliff' => array(0 => 'xlf', 1 => 'xliff'), 'translation.loader.po' => array(0 => 'po'), 'translation.loader.mo' => array(0 => 'mo'), 'translation.loader.qt' => array(0 => 'ts'), 'translation.loader.csv' => array(0 => 'csv'), 'translation.loader.res' => array(0 => 'res'), 'translation.loader.dat' => array(0 => 'dat'), 'translation.loader.ini' => array(0 => 'ini')), array('cache_dir' => '/srv/civix/app/cache/dev/translations', 'debug' => true));
    }

    /**
     * Gets the 'twig' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Twig_Environment A Twig_Environment instance.
     */
    protected function getTwigService()
    {
        $a = $this->get('security.context');

        $this->services['twig'] = $instance = new \Twig_Environment($this->get('twig.loader'), array('debug' => true, 'strict_variables' => true, 'exception_controller' => 'twig.controller.exception:showAction', 'autoescape_service' => NULL, 'autoescape_service_method' => NULL, 'cache' => '/srv/civix/app/cache/dev/twig', 'charset' => 'UTF-8', 'paths' => array()));

        $instance->addExtension(new \Symfony\Bundle\SecurityBundle\Twig\Extension\LogoutUrlExtension($this->get('templating.helper.logout_url')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\SecurityExtension($a));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension($this->get('translator')));
        $instance->addExtension(new \Symfony\Bundle\TwigBundle\Extension\AssetsExtension($this));
        $instance->addExtension(new \Symfony\Bundle\TwigBundle\Extension\ActionsExtension($this));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\CodeExtension(NULL, '/srv/civix/app', 'UTF-8'));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\RoutingExtension($this->get('router')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\YamlExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpKernelExtension($this->get('fragment.handler')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\FormExtension(new \Symfony\Bridge\Twig\Form\TwigRenderer(new \Symfony\Bridge\Twig\Form\TwigRendererEngine(array(0 => 'form_div_layout.html.twig', 1 => 'MopaBootstrapBundle:Form:fields.html.twig', 2 => 'CivixFrontBundle::fields.html.twig', 3 => 'CivixFrontBundle::imageField.html.twig', 4 => 'EWZRecaptchaBundle:Form:ewz_recaptcha_widget.html.twig')), $this->get('form.csrf_provider', ContainerInterface::NULL_ON_INVALID_REFERENCE))));
        $instance->addExtension(new \Twig_Extension_Debug());
        $instance->addExtension(new \Symfony\Bundle\AsseticBundle\Twig\AsseticExtension($this->get('assetic.asset_factory'), $this->get('templating.name_parser'), false, array(), array(0 => 'FrameworkBundle', 1 => 'SecurityBundle', 2 => 'TwigBundle', 3 => 'MonologBundle', 4 => 'SwiftmailerBundle', 5 => 'AsseticBundle', 6 => 'DoctrineBundle', 7 => 'DoctrineFixturesBundle', 8 => 'DoctrineMigrationsBundle', 9 => 'SensioFrameworkExtraBundle', 10 => 'JMSAopBundle', 11 => 'JMSDiExtraBundle', 12 => 'JMSSecurityExtraBundle', 13 => 'JMSSerializerBundle', 14 => 'MopaBootstrapBundle', 15 => 'KnpMenuBundle', 16 => 'KnpPaginatorBundle', 17 => 'EWZRecaptchaBundle', 18 => 'KnpGaufretteBundle', 19 => 'VichUploaderBundle', 20 => 'RMSPushNotificationsBundle', 21 => 'OldSoundRabbitMqBundle', 22 => 'CivixFrontBundle', 23 => 'CivixCoreBundle', 24 => 'CivixApiBundle', 25 => 'CivixBalancedBundle', 26 => 'WebProfilerBundle', 27 => 'SensioDistributionBundle', 28 => 'SensioGeneratorBundle', 29 => 'NelmioApiDocBundle', 30 => 'CivixLoadBundle'), new \Symfony\Bundle\AsseticBundle\DefaultValueSupplier($this)));
        $instance->addExtension(new \Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension());
        $instance->addExtension(new \JMS\SecurityExtraBundle\Twig\SecurityExtension($a));
        $instance->addExtension(new \JMS\Serializer\Twig\SerializerExtension($this->get('jms_serializer')));
        $instance->addExtension($this->get('twig.extension.mopa.form'));
        $instance->addExtension($this->get('mopa_bootstrap.navbar.twig.extension'));
        $instance->addExtension(new \Knp\Menu\Twig\MenuExtension(new \Knp\Menu\Twig\Helper($this->get('knp_menu.renderer_provider'), $this->get('knp_menu.menu_provider'))));
        $instance->addExtension($this->get('knp_paginator.twig.extension.pagination'));
        $instance->addExtension(new \Vich\UploaderBundle\Twig\Extension\UploaderExtension($this->get('vich_uploader.templating.helper.uploader_helper')));
        $instance->addExtension($this->get('nelmio_api_doc.twig.extension.extra_markdown'));
        $instance->addGlobal('app', $this->get('templating.globals'));
        $instance->addGlobal('stripe_publishable_key', 'pk_live_hRBIgf1WvZ1qyhDpP3KQHEyE');

        return $instance;
    }

    /**
     * Gets the 'twig.controller.exception' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\TwigBundle\Controller\ExceptionController A Symfony\Bundle\TwigBundle\Controller\ExceptionController instance.
     */
    protected function getTwig_Controller_ExceptionService()
    {
        return $this->services['twig.controller.exception'] = new \Symfony\Bundle\TwigBundle\Controller\ExceptionController($this->get('twig'), true);
    }

    /**
     * Gets the 'twig.exception_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ExceptionListener A Symfony\Component\HttpKernel\EventListener\ExceptionListener instance.
     */
    protected function getTwig_ExceptionListenerService()
    {
        return $this->services['twig.exception_listener'] = new \Symfony\Component\HttpKernel\EventListener\ExceptionListener('twig.controller.exception:showAction', $this->get('monolog.logger.request', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'twig.extension.mopa.form' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Mopa\Bundle\BootstrapBundle\Twig\MopaBootstrapTwigExtension A Mopa\Bundle\BootstrapBundle\Twig\MopaBootstrapTwigExtension instance.
     */
    protected function getTwig_Extension_Mopa_FormService()
    {
        return $this->services['twig.extension.mopa.form'] = new \Mopa\Bundle\BootstrapBundle\Twig\MopaBootstrapTwigExtension($this);
    }

    /**
     * Gets the 'twig.loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\TwigBundle\Loader\FilesystemLoader A Symfony\Bundle\TwigBundle\Loader\FilesystemLoader instance.
     */
    protected function getTwig_LoaderService()
    {
        $this->services['twig.loader'] = $instance = new \Symfony\Bundle\TwigBundle\Loader\FilesystemLoader($this->get('templating.locator'), $this->get('templating.name_parser'));

        $instance->addPath('/srv/civix/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views', 'Framework');
        $instance->addPath('/srv/civix/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/Resources/views', 'Security');
        $instance->addPath('/srv/civix/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views', 'Twig');
        $instance->addPath('/srv/civix/vendor/symfony/swiftmailer-bundle/Resources/views', 'Swiftmailer');
        $instance->addPath('/srv/civix/vendor/doctrine/doctrine-bundle/Doctrine/Bundle/DoctrineBundle/Resources/views', 'Doctrine');
        $instance->addPath('/srv/civix/vendor/mopa/bootstrap-bundle/Mopa/Bundle/BootstrapBundle/Resources/views', 'MopaBootstrap');
        $instance->addPath('/srv/civix/vendor/knplabs/knp-paginator-bundle/Knp/Bundle/PaginatorBundle/Resources/views', 'KnpPaginator');
        $instance->addPath('/srv/civix/vendor/excelwebzone/recaptcha-bundle/EWZ/Bundle/RecaptchaBundle/Resources/views', 'EWZRecaptcha');
        $instance->addPath('/srv/civix/vendor/oldsound/rabbitmq-bundle/OldSound/RabbitMqBundle/Resources/views', 'OldSoundRabbitMq');
        $instance->addPath('/srv/civix/src/Civix/FrontBundle/Resources/views', 'CivixFront');
        $instance->addPath('/srv/civix/src/Civix/CoreBundle/Resources/views', 'CivixCore');
        $instance->addPath('/srv/civix/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views', 'WebProfiler');
        $instance->addPath('/srv/civix/vendor/sensio/distribution-bundle/Sensio/Bundle/DistributionBundle/Resources/views', 'SensioDistribution');
        $instance->addPath('/srv/civix/vendor/nelmio/api-doc-bundle/Nelmio/ApiDocBundle/Resources/views', 'NelmioApiDoc');
        $instance->addPath('/srv/civix/app/Resources/views');
        $instance->addPath('/srv/civix/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Resources/views/Form');
        $instance->addPath('/srv/civix/vendor/knplabs/knp-menu/src/Knp/Menu/Resources/views');

        return $instance;
    }

    /**
     * Gets the 'twig.translation.extractor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Twig\Translation\TwigExtractor A Symfony\Bridge\Twig\Translation\TwigExtractor instance.
     */
    protected function getTwig_Translation_ExtractorService()
    {
        return $this->services['twig.translation.extractor'] = new \Symfony\Bridge\Twig\Translation\TwigExtractor($this->get('twig'));
    }

    /**
     * Gets the 'uri_signer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\UriSigner A Symfony\Component\HttpKernel\UriSigner instance.
     */
    protected function getUriSignerService()
    {
        return $this->services['uri_signer'] = new \Symfony\Component\HttpKernel\UriSigner('ThisTokenIsNotSoSecretChangeIt');
    }

    /**
     * Gets the 'validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Validator\Validator A Symfony\Component\Validator\Validator instance.
     */
    protected function getValidatorService()
    {
        return $this->services['validator'] = new \Symfony\Component\Validator\Validator($this->get('validator.mapping.class_metadata_factory'), new \Symfony\Bundle\FrameworkBundle\Validator\ConstraintValidatorFactory($this, array('security.validator.user_password' => 'security.validator.user_password', 'doctrine.orm.validator.unique' => 'doctrine.orm.validator.unique', 'ewz_recaptcha.true' => 'ewz_recaptcha.validator.true', 'civix_core.validator.facebook_token' => 'civix_core.validator.facebook_token', 'civix_core.validator.not_joined_to_group' => 'civix_core.validator.not_joined_to_group')), $this->get('translator.default'), 'validators', array(0 => $this->get('doctrine.orm.validator_initializer')));
    }

    /**
     * Gets the 'vich_uploader.file_injector' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Vich\UploaderBundle\Injector\FileInjector A Vich\UploaderBundle\Injector\FileInjector instance.
     */
    protected function getVichUploader_FileInjectorService()
    {
        return $this->services['vich_uploader.file_injector'] = new \Vich\UploaderBundle\Injector\FileInjector($this->get('vich_uploader.property_mapping_factory'), $this->get('vich_uploader.storage'));
    }

    /**
     * Gets the 'vich_uploader.namer_uniqid' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Vich\UploaderBundle\Naming\UniqidNamer A Vich\UploaderBundle\Naming\UniqidNamer instance.
     */
    protected function getVichUploader_NamerUniqidService()
    {
        return $this->services['vich_uploader.namer_uniqid'] = new \Vich\UploaderBundle\Naming\UniqidNamer();
    }

    /**
     * Gets the 'vich_uploader.storage' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Vich\UploaderBundle\Storage\StorageInterface A Vich\UploaderBundle\Storage\StorageInterface instance.
     */
    protected function getVichUploader_StorageService()
    {
        return $this->services['vich_uploader.storage'] = $this->get('vich_uploader.storage_factory')->createStorage();
    }

    /**
     * Gets the 'vich_uploader.storage.file_system' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Vich\UploaderBundle\Storage\FileSystemStorage A Vich\UploaderBundle\Storage\FileSystemStorage instance.
     */
    protected function getVichUploader_Storage_FileSystemService()
    {
        return $this->services['vich_uploader.storage.file_system'] = new \Vich\UploaderBundle\Storage\FileSystemStorage($this->get('vich_uploader.property_mapping_factory'));
    }

    /**
     * Gets the 'vich_uploader.storage.gaufrette' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Vich\UploaderBundle\Storage\GaufretteStorage A Vich\UploaderBundle\Storage\GaufretteStorage instance.
     */
    protected function getVichUploader_Storage_GaufretteService()
    {
        return $this->services['vich_uploader.storage.gaufrette'] = new \Vich\UploaderBundle\Storage\GaufretteStorage($this->get('vich_uploader.property_mapping_factory'), $this->get('knp_gaufrette.filesystem_map'));
    }

    /**
     * Gets the 'vich_uploader.storage_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Vich\UploaderBundle\Storage\StorageFactory A Vich\UploaderBundle\Storage\StorageFactory instance.
     */
    protected function getVichUploader_StorageFactoryService()
    {
        return $this->services['vich_uploader.storage_factory'] = new \Vich\UploaderBundle\Storage\StorageFactory($this);
    }

    /**
     * Gets the 'vich_uploader.templating.helper.uploader_helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Vich\UploaderBundle\Templating\Helper\UploaderHelper A Vich\UploaderBundle\Templating\Helper\UploaderHelper instance.
     */
    protected function getVichUploader_Templating_Helper_UploaderHelperService()
    {
        return $this->services['vich_uploader.templating.helper.uploader_helper'] = new \Vich\UploaderBundle\Templating\Helper\UploaderHelper($this->get('vich_uploader.storage'));
    }

    /**
     * Gets the 'web_profiler.controller.exception' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\Controller\ExceptionController A Symfony\Bundle\WebProfilerBundle\Controller\ExceptionController instance.
     */
    protected function getWebProfiler_Controller_ExceptionService()
    {
        return $this->services['web_profiler.controller.exception'] = new \Symfony\Bundle\WebProfilerBundle\Controller\ExceptionController($this->get('profiler', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('twig'), true);
    }

    /**
     * Gets the 'web_profiler.controller.profiler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\Controller\ProfilerController A Symfony\Bundle\WebProfilerBundle\Controller\ProfilerController instance.
     */
    protected function getWebProfiler_Controller_ProfilerService()
    {
        return $this->services['web_profiler.controller.profiler'] = new \Symfony\Bundle\WebProfilerBundle\Controller\ProfilerController($this->get('router', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('profiler', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('twig'), array('data_collector.config' => array(0 => 'config', 1 => '@WebProfiler/Collector/config.html.twig'), 'data_collector.request' => array(0 => 'request', 1 => '@WebProfiler/Collector/request.html.twig'), 'data_collector.exception' => array(0 => 'exception', 1 => '@WebProfiler/Collector/exception.html.twig'), 'data_collector.events' => array(0 => 'events', 1 => '@WebProfiler/Collector/events.html.twig'), 'data_collector.logger' => array(0 => 'logger', 1 => '@WebProfiler/Collector/logger.html.twig'), 'data_collector.time' => array(0 => 'time', 1 => '@WebProfiler/Collector/time.html.twig'), 'data_collector.memory' => array(0 => 'memory', 1 => '@WebProfiler/Collector/memory.html.twig'), 'data_collector.router' => array(0 => 'router', 1 => '@WebProfiler/Collector/router.html.twig'), 'data_collector.security' => array(0 => 'security', 1 => 'SecurityBundle:Collector:security'), 'swiftmailer.data_collector' => array(0 => 'swiftmailer', 1 => '@Swiftmailer/Collector/swiftmailer.html.twig'), 'data_collector.doctrine' => array(0 => 'db', 1 => 'DoctrineBundle:Collector:db')), 'bottom');
    }

    /**
     * Gets the 'web_profiler.controller.router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\Controller\RouterController A Symfony\Bundle\WebProfilerBundle\Controller\RouterController instance.
     */
    protected function getWebProfiler_Controller_RouterService()
    {
        return $this->services['web_profiler.controller.router'] = new \Symfony\Bundle\WebProfilerBundle\Controller\RouterController($this->get('profiler', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('twig'), $this->get('router', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'web_profiler.debug_toolbar' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener A Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener instance.
     */
    protected function getWebProfiler_DebugToolbarService()
    {
        return $this->services['web_profiler.debug_toolbar'] = new \Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener($this->get('twig'), false, 2, 'bottom');
    }

    /**
     * Updates the 'request' service.
     */
    protected function synchronizeRequestService()
    {
        if ($this->initialized('locale_listener')) {
            $this->get('locale_listener')->setRequest($this->get('request', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        }
        if ($this->initialized('fragment.handler')) {
            $this->get('fragment.handler')->setRequest($this->get('request', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        }
        if ($this->initialized('router_listener')) {
            $this->get('router_listener')->setRequest($this->get('request', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        }
    }

    /**
     * Gets the 'assetic.asset_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Bundle\AsseticBundle\Factory\AssetFactory A Symfony\Bundle\AsseticBundle\Factory\AssetFactory instance.
     */
    protected function getAssetic_AssetFactoryService()
    {
        $this->services['assetic.asset_factory'] = $instance = new \Symfony\Bundle\AsseticBundle\Factory\AssetFactory($this->get('kernel'), $this, $this->getParameterBag(), '/srv/civix/app/../web', true);

        $instance->addWorker(new \Assetic\Factory\Worker\EnsureFilterWorker('/\\.less$/', $this->get('assetic.filter.lessphp')));

        return $instance;
    }

    /**
     * Gets the 'controller_name_converter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser A Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser instance.
     */
    protected function getControllerNameConverterService()
    {
        return $this->services['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser($this->get('kernel'));
    }

    /**
     * Gets the 'doctrine.dbal.logger.profiling.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Doctrine\DBAL\Logging\DebugStack A Doctrine\DBAL\Logging\DebugStack instance.
     */
    protected function getDoctrine_Dbal_Logger_Profiling_DefaultService()
    {
        return $this->services['doctrine.dbal.logger.profiling.default'] = new \Doctrine\DBAL\Logging\DebugStack();
    }

    /**
     * Gets the 'jms_di_extra.controller_resolver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \JMS\DiExtraBundle\HttpKernel\ControllerResolver A JMS\DiExtraBundle\HttpKernel\ControllerResolver instance.
     */
    protected function getJmsDiExtra_ControllerResolverService()
    {
        return $this->services['jms_di_extra.controller_resolver'] = new \JMS\DiExtraBundle\HttpKernel\ControllerResolver($this, $this->get('controller_name_converter'), $this->get('monolog.logger.request', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'jms_serializer.metadata_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Metadata\MetadataFactory A Metadata\MetadataFactory instance.
     */
    protected function getJmsSerializer_MetadataFactoryService()
    {
        $this->services['jms_serializer.metadata_factory'] = $instance = new \Metadata\MetadataFactory(new \Metadata\Driver\LazyLoadingDriver($this, 'jms_serializer.metadata_driver'), 'Metadata\\ClassHierarchyMetadata', true);

        $instance->setCache(new \Metadata\Cache\FileCache('/srv/civix/app/cache/dev/jms_serializer'));

        return $instance;
    }

    /**
     * Gets the 'jms_serializer.unserialize_object_constructor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \JMS\Serializer\Construction\UnserializeObjectConstructor A JMS\Serializer\Construction\UnserializeObjectConstructor instance.
     */
    protected function getJmsSerializer_UnserializeObjectConstructorService()
    {
        return $this->services['jms_serializer.unserialize_object_constructor'] = new \JMS\Serializer\Construction\UnserializeObjectConstructor();
    }

    /**
     * Gets the 'router.request_context' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Routing\RequestContext A Symfony\Component\Routing\RequestContext instance.
     */
    protected function getRouter_RequestContextService()
    {
        return $this->services['router.request_context'] = new \Symfony\Component\Routing\RequestContext('', 'GET', 'localhost', 'http', 80, 443);
    }

    /**
     * Gets the 'security.access_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Security\Http\Firewall\AccessListener A Symfony\Component\Security\Http\Firewall\AccessListener instance.
     */
    protected function getSecurity_AccessListenerService()
    {
        return $this->services['security.access_listener'] = new \Symfony\Component\Security\Http\Firewall\AccessListener($this->get('security.context'), $this->get('security.access.decision_manager'), $this->get('security.access_map'), $this->get('security.authentication.manager'));
    }

    /**
     * Gets the 'security.access_map' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Security\Http\AccessMap A Symfony\Component\Security\Http\AccessMap instance.
     */
    protected function getSecurity_AccessMapService()
    {
        return $this->services['security.access_map'] = new \Symfony\Component\Security\Http\AccessMap();
    }

    /**
     * Gets the 'security.authentication.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager A Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager instance.
     */
    protected function getSecurity_Authentication_ManagerService()
    {
        $a = $this->get('security.encoder_factory');
        $b = $this->get('doctrine.orm.default_entity_manager');

        $c = new \Symfony\Component\Security\Core\User\UserChecker();

        $d = new \Civix\ApiBundle\Security\Core\ApiUserProvider($b);

        $this->services['security.authentication.manager'] = $instance = new \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager(array(0 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('56902dad93d11'), 1 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('56902dad93d11'), 2 => new \Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider($this->get('security.user.provider.concrete.representative'), $c, 'representative_security_area', $a, true), 3 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('56902dad93d11'), 4 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('56902dad93d11'), 5 => new \Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider($this->get('security.user.provider.concrete.group'), $c, 'group_security_area', $a, true), 6 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('56902dad93d11'), 7 => new \Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider($this->get('security.user.provider.concrete.superuser'), $c, 'superuser_security_area', $a, true), 8 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('56902dad93d11'), 9 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('56902dad93d11'), 10 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('56902dad93d11'), 11 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('56902dad93d11'), 12 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('56902dad93d11'), 13 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('56902dad93d11'), 14 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('56902dad93d11'), 15 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('56902dad93d11'), 16 => new \Civix\ApiBundle\Security\Authentication\Provider\ApiProvider($d), 17 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('56902dad93d11'), 18 => new \Civix\ApiBundle\Security\Authentication\Provider\ApiProvider($d), 19 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('56902dad93d11')), true);

        $instance->setEventDispatcher($this->get('event_dispatcher'));

        return $instance;
    }

    /**
     * Gets the 'security.authentication.session_strategy' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Security\Http\Session\SessionAuthenticationStrategy A Symfony\Component\Security\Http\Session\SessionAuthenticationStrategy instance.
     */
    protected function getSecurity_Authentication_SessionStrategyService()
    {
        return $this->services['security.authentication.session_strategy'] = new \Symfony\Component\Security\Http\Session\SessionAuthenticationStrategy('migrate');
    }

    /**
     * Gets the 'security.channel_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Security\Http\Firewall\ChannelListener A Symfony\Component\Security\Http\Firewall\ChannelListener instance.
     */
    protected function getSecurity_ChannelListenerService()
    {
        return $this->services['security.channel_listener'] = new \Symfony\Component\Security\Http\Firewall\ChannelListener($this->get('security.access_map'), new \Symfony\Component\Security\Http\EntryPoint\RetryAuthenticationEntryPoint(80, 443), $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'security.expressions.handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \JMS\SecurityExtraBundle\Security\Authorization\Expression\ContainerAwareExpressionHandler A JMS\SecurityExtraBundle\Security\Authorization\Expression\ContainerAwareExpressionHandler instance.
     */
    protected function getSecurity_Expressions_HandlerService()
    {
        return $this->services['security.expressions.handler'] = new \JMS\SecurityExtraBundle\Security\Authorization\Expression\ContainerAwareExpressionHandler($this);
    }

    /**
     * Gets the 'security.extra.metadata_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Metadata\MetadataFactory A Metadata\MetadataFactory instance.
     */
    protected function getSecurity_Extra_MetadataFactoryService()
    {
        $this->services['security.extra.metadata_factory'] = $instance = new \Metadata\MetadataFactory(new \Metadata\Driver\LazyLoadingDriver($this, 'security.extra.metadata_driver'), new \Metadata\Cache\FileCache('/srv/civix/app/cache/dev/jms_security', true));

        $instance->setIncludeInterfaces(true);

        return $instance;
    }

    /**
     * Gets the 'security.http_utils' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Security\Http\HttpUtils A Symfony\Component\Security\Http\HttpUtils instance.
     */
    protected function getSecurity_HttpUtilsService()
    {
        $a = $this->get('router', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.http_utils'] = new \Symfony\Component\Security\Http\HttpUtils($a, $a);
    }

    /**
     * Gets the 'security.logout.handler.session' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Security\Http\Logout\SessionLogoutHandler A Symfony\Component\Security\Http\Logout\SessionLogoutHandler instance.
     */
    protected function getSecurity_Logout_Handler_SessionService()
    {
        return $this->services['security.logout.handler.session'] = new \Symfony\Component\Security\Http\Logout\SessionLogoutHandler();
    }

    /**
     * Gets the 'security.user.provider.concrete.group' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Bridge\Doctrine\Security\User\EntityUserProvider A Symfony\Bridge\Doctrine\Security\User\EntityUserProvider instance.
     */
    protected function getSecurity_User_Provider_Concrete_GroupService()
    {
        return $this->services['security.user.provider.concrete.group'] = new \Symfony\Bridge\Doctrine\Security\User\EntityUserProvider($this->get('doctrine'), 'CivixCoreBundle:Group', 'username', NULL);
    }

    /**
     * Gets the 'security.user.provider.concrete.mobileuser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Bridge\Doctrine\Security\User\EntityUserProvider A Symfony\Bridge\Doctrine\Security\User\EntityUserProvider instance.
     */
    protected function getSecurity_User_Provider_Concrete_MobileuserService()
    {
        return $this->services['security.user.provider.concrete.mobileuser'] = new \Symfony\Bridge\Doctrine\Security\User\EntityUserProvider($this->get('doctrine'), 'CivixCoreBundle:User', 'username', NULL);
    }

    /**
     * Gets the 'security.user.provider.concrete.representative' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Bridge\Doctrine\Security\User\EntityUserProvider A Symfony\Bridge\Doctrine\Security\User\EntityUserProvider instance.
     */
    protected function getSecurity_User_Provider_Concrete_RepresentativeService()
    {
        return $this->services['security.user.provider.concrete.representative'] = new \Symfony\Bridge\Doctrine\Security\User\EntityUserProvider($this->get('doctrine'), 'CivixCoreBundle:Representative', 'username', NULL);
    }

    /**
     * Gets the 'security.user.provider.concrete.superuser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Bridge\Doctrine\Security\User\EntityUserProvider A Symfony\Bridge\Doctrine\Security\User\EntityUserProvider instance.
     */
    protected function getSecurity_User_Provider_Concrete_SuperuserService()
    {
        return $this->services['security.user.provider.concrete.superuser'] = new \Symfony\Bridge\Doctrine\Security\User\EntityUserProvider($this->get('doctrine'), 'CivixCoreBundle:Superuser', 'username', NULL);
    }

    /**
     * Gets the 'swiftmailer.mailer.default.transport.eventdispatcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Swift_Events_SimpleEventDispatcher A Swift_Events_SimpleEventDispatcher instance.
     */
    protected function getSwiftmailer_Mailer_Default_Transport_EventdispatcherService()
    {
        return $this->services['swiftmailer.mailer.default.transport.eventdispatcher'] = new \Swift_Events_SimpleEventDispatcher();
    }

    /**
     * Gets the 'templating.locator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator A Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator instance.
     */
    protected function getTemplating_LocatorService()
    {
        return $this->services['templating.locator'] = new \Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator($this->get('file_locator'), '/srv/civix/app/cache/dev');
    }

    /**
     * Gets the 'translator.selector' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Translation\MessageSelector A Symfony\Component\Translation\MessageSelector instance.
     */
    protected function getTranslator_SelectorService()
    {
        return $this->services['translator.selector'] = new \Symfony\Component\Translation\MessageSelector();
    }

    /**
     * Gets the 'validator.mapping.class_metadata_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Validator\Mapping\ClassMetadataFactory A Symfony\Component\Validator\Mapping\ClassMetadataFactory instance.
     */
    protected function getValidator_Mapping_ClassMetadataFactoryService()
    {
        return $this->services['validator.mapping.class_metadata_factory'] = new \Symfony\Component\Validator\Mapping\ClassMetadataFactory(new \Symfony\Component\Validator\Mapping\Loader\LoaderChain(array(0 => new \Symfony\Component\Validator\Mapping\Loader\AnnotationLoader($this->get('annotation_reader')), 1 => new \Symfony\Component\Validator\Mapping\Loader\StaticMethodLoader(), 2 => new \Symfony\Component\Validator\Mapping\Loader\XmlFilesLoader(array(0 => '/srv/civix/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/config/validation.xml')), 3 => new \Symfony\Component\Validator\Mapping\Loader\YamlFilesLoader(array()))), NULL);
    }

    /**
     * Gets the 'vich_uploader.adapter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Vich\UploaderBundle\Adapter\ORM\DoctrineORMAdapter A Vich\UploaderBundle\Adapter\ORM\DoctrineORMAdapter instance.
     */
    protected function getVichUploader_AdapterService()
    {
        return $this->services['vich_uploader.adapter'] = new \Vich\UploaderBundle\Adapter\ORM\DoctrineORMAdapter();
    }

    /**
     * Gets the 'vich_uploader.annotation_driver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Vich\UploaderBundle\Driver\AnnotationDriver A Vich\UploaderBundle\Driver\AnnotationDriver instance.
     */
    protected function getVichUploader_AnnotationDriverService()
    {
        return $this->services['vich_uploader.annotation_driver'] = new \Vich\UploaderBundle\Driver\AnnotationDriver($this->get('annotation_reader'));
    }

    /**
     * Gets the 'vich_uploader.property_mapping_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Vich\UploaderBundle\Mapping\PropertyMappingFactory A Vich\UploaderBundle\Mapping\PropertyMappingFactory instance.
     */
    protected function getVichUploader_PropertyMappingFactoryService()
    {
        return $this->services['vich_uploader.property_mapping_factory'] = new \Vich\UploaderBundle\Mapping\PropertyMappingFactory($this, $this->get('vich_uploader.annotation_driver'), $this->get('vich_uploader.adapter'), array('avatar_image' => array('uri_prefix' => 'http://stagingpowerline.s3-website-us-east-1.amazonaws.com/avatars', 'upload_destination' => 'avatar_image_fs', 'namer' => 'vich_uploader.namer_uniqid', 'directory_namer' => NULL, 'delete_on_remove' => true, 'delete_on_update' => true, 'inject_on_load' => true), 'avatar_source_image' => array('uri_prefix' => 'http://stagingpowerline.s3-website-us-east-1.amazonaws.com/avatars/src', 'upload_destination' => 'avatar_source_image_fs', 'namer' => 'vich_uploader.namer_uniqid', 'directory_namer' => NULL, 'delete_on_remove' => true, 'delete_on_update' => true, 'inject_on_load' => true), 'avatar_representative' => array('uri_prefix' => 'http://stagingpowerline.s3-website-us-east-1.amazonaws.com/avatars/representatives', 'upload_destination' => 'avatar_representative_fs', 'namer' => 'vich_uploader.namer_uniqid', 'directory_namer' => NULL, 'delete_on_remove' => true, 'delete_on_update' => true, 'inject_on_load' => true), 'educational_image' => array('uri_prefix' => 'http://stagingpowerline.s3-website-us-east-1.amazonaws.com/educational', 'delete_on_update' => true, 'delete_on_remove' => true, 'upload_destination' => 'educational_image_fs', 'namer' => 'vich_uploader.namer_uniqid', 'directory_namer' => NULL, 'inject_on_load' => true), 'post_image' => array('uri_prefix' => 'http://stagingpowerline.s3-website-us-east-1.amazonaws.com/posts', 'delete_on_update' => true, 'delete_on_remove' => true, 'upload_destination' => 'blog_post_fs', 'namer' => 'vich_uploader.namer_uniqid', 'directory_namer' => NULL, 'inject_on_load' => true)));
    }

    /**
     * {@inheritdoc}
     */
    public function getParameter($name)
    {
        $name = strtolower($name);

        if (!(isset($this->parameters[$name]) || array_key_exists($name, $this->parameters))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }

        return $this->parameters[$name];
    }

    /**
     * {@inheritdoc}
     */
    public function hasParameter($name)
    {
        $name = strtolower($name);

        return isset($this->parameters[$name]) || array_key_exists($name, $this->parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    /**
     * {@inheritdoc}
     */
    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $this->parameterBag = new FrozenParameterBag($this->parameters);
        }

        return $this->parameterBag;
    }
    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return array(
            'kernel.root_dir' => '/srv/civix/app',
            'kernel.environment' => 'dev',
            'kernel.debug' => true,
            'kernel.name' => 'app',
            'kernel.cache_dir' => '/srv/civix/app/cache/dev',
            'kernel.logs_dir' => '/srv/civix/app/logs',
            'kernel.bundles' => array(
                'FrameworkBundle' => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle',
                'SecurityBundle' => 'Symfony\\Bundle\\SecurityBundle\\SecurityBundle',
                'TwigBundle' => 'Symfony\\Bundle\\TwigBundle\\TwigBundle',
                'MonologBundle' => 'Symfony\\Bundle\\MonologBundle\\MonologBundle',
                'SwiftmailerBundle' => 'Symfony\\Bundle\\SwiftmailerBundle\\SwiftmailerBundle',
                'AsseticBundle' => 'Symfony\\Bundle\\AsseticBundle\\AsseticBundle',
                'DoctrineBundle' => 'Doctrine\\Bundle\\DoctrineBundle\\DoctrineBundle',
                'DoctrineFixturesBundle' => 'Doctrine\\Bundle\\FixturesBundle\\DoctrineFixturesBundle',
                'DoctrineMigrationsBundle' => 'Doctrine\\Bundle\\MigrationsBundle\\DoctrineMigrationsBundle',
                'SensioFrameworkExtraBundle' => 'Sensio\\Bundle\\FrameworkExtraBundle\\SensioFrameworkExtraBundle',
                'JMSAopBundle' => 'JMS\\AopBundle\\JMSAopBundle',
                'JMSDiExtraBundle' => 'JMS\\DiExtraBundle\\JMSDiExtraBundle',
                'JMSSecurityExtraBundle' => 'JMS\\SecurityExtraBundle\\JMSSecurityExtraBundle',
                'JMSSerializerBundle' => 'JMS\\SerializerBundle\\JMSSerializerBundle',
                'MopaBootstrapBundle' => 'Mopa\\Bundle\\BootstrapBundle\\MopaBootstrapBundle',
                'KnpMenuBundle' => 'Knp\\Bundle\\MenuBundle\\KnpMenuBundle',
                'KnpPaginatorBundle' => 'Knp\\Bundle\\PaginatorBundle\\KnpPaginatorBundle',
                'EWZRecaptchaBundle' => 'EWZ\\Bundle\\RecaptchaBundle\\EWZRecaptchaBundle',
                'KnpGaufretteBundle' => 'Knp\\Bundle\\GaufretteBundle\\KnpGaufretteBundle',
                'VichUploaderBundle' => 'Vich\\UploaderBundle\\VichUploaderBundle',
                'RMSPushNotificationsBundle' => 'RMS\\PushNotificationsBundle\\RMSPushNotificationsBundle',
                'OldSoundRabbitMqBundle' => 'OldSound\\RabbitMqBundle\\OldSoundRabbitMqBundle',
                'CivixFrontBundle' => 'Civix\\FrontBundle\\CivixFrontBundle',
                'CivixCoreBundle' => 'Civix\\CoreBundle\\CivixCoreBundle',
                'CivixApiBundle' => 'Civix\\ApiBundle\\CivixApiBundle',
                'CivixBalancedBundle' => 'Civix\\BalancedBundle\\CivixBalancedBundle',
                'WebProfilerBundle' => 'Symfony\\Bundle\\WebProfilerBundle\\WebProfilerBundle',
                'SensioDistributionBundle' => 'Sensio\\Bundle\\DistributionBundle\\SensioDistributionBundle',
                'SensioGeneratorBundle' => 'Sensio\\Bundle\\GeneratorBundle\\SensioGeneratorBundle',
                'NelmioApiDocBundle' => 'Nelmio\\ApiDocBundle\\NelmioApiDocBundle',
                'CivixLoadBundle' => 'Civix\\LoadBundle\\CivixLoadBundle',
            ),
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'appDevDebugProjectContainer',
            'database_driver' => 'pdo_mysql',
            'database_host' => 'civixdevdb.c5ywiczyhtjr.us-east-1.rds.amazonaws.com',
            'database_port' => NULL,
            'database_name' => 'civixdevdb',
            'database_user' => 'civixdevdb',
            'database_password' => 'civixdevdb',
            'mailer_transport' => 'smtp',
            'mailer_host' => 'email-smtp.us-east-1.amazonaws.com',
            'mailer_user' => 'AKIAIR3T4SCMIWOTAOWA',
            'mailer_password' => 'Ap3rzxOaji8sJUduNAp1+yQf3jTFXudxsivCg/S760lE',
            'mailer_from' => 'support@powerli.ne',
            'mailer_beta_access_recipient' => 'sergey.sak@intellectsoft.org',
            'locale' => 'en',
            'secret' => 'ThisTokenIsNotSoSecretChangeIt',
            'domain' => 'dev.powerli.ne',
            'amazon_s3.key' => 'AKIAJEQTFQEZC4T4IIZA',
            'amazon_s3.secret' => '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',
            'amazon_s3.region' => 'us-east-1',
            'amazon_s3.bucket' => 'stagingpowerline',
            'amazon_s3.url' => 'http://stagingpowerline.s3-website-us-east-1.amazonaws.com',
            'amazon_sns.android_arn' => 'arn:aws:sns:us-east-1:863632456175:app/GCM/powerline_android_staging',
            'amazon_sns.ios_arn' => 'arn:aws:sns:us-east-1:863632456175:app/APNS/powerline_ios_staging',
            'recaptcha_public_key' => '6Ld7POMSAAAAAJSCpXu9X_LAMwxMVCRjDWYOW1D9',
            'recaptcha_private_key' => '6Ld7POMSAAAAAEvKq_cq1UnxITF9Vbogc8bjtVb4',
            'recaptcha_secure' => false,
            'recaptcha_locale_key' => 'kernel.default_locale',
            'recaptcha_enabled' => true,
            'cicero_login' => 'ACTL3C',
            'cicero_password' => 'First50L3C',
            'android_api_key' => 'AIzaSyATaBdlsU1q_xZnETbklseTp_vTx7rNUUw',
            'android_app' => 840335271357,
            'ios_is_sanbox' => false,
            'ios_pem_path' => '/srv/certs/apns-dev-civix.pem',
            'ios_passphrase' => NULL,
            'sunlightapi_token' => '389db47962a64accae30b8948c397a6d',
            'balanced_payment_api_key' => 'ak-test-223c13hVsxbcGMaqCXq3tleHvMCXeXRBR',
            'balanced_payment_marketplace_user_id' => 'TEST-MP7ByVfFJSMah8VMM0blIek6',
            'stripe_api_key' => 'sk_live_3ysnRoVv7bbCHtxrRPvNUrQg',
            'stripe_publishable_key' => 'pk_live_hRBIgf1WvZ1qyhDpP3KQHEyE',
            'rabbitmq_connections' => array(
                'default' => array(
                    'host' => 'localhost',
                    'port' => 5672,
                    'user' => 'civix',
                    'password' => 'civix',
                    'vhost' => 'civix',
                ),
            ),
            'mailgun_public' => 'pubkey-d74e021acaeaf1ca97949c8a16899e93',
            'mailgun_private' => 'key-de1771b1c0056a4895cccd34f425ffe7',
            'controller_resolver.class' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ControllerResolver',
            'controller_name_converter.class' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ControllerNameParser',
            'response_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\ResponseListener',
            'streamed_response_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\StreamedResponseListener',
            'locale_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\LocaleListener',
            'event_dispatcher.class' => 'Symfony\\Component\\EventDispatcher\\ContainerAwareEventDispatcher',
            'http_kernel.class' => 'Symfony\\Component\\HttpKernel\\DependencyInjection\\ContainerAwareHttpKernel',
            'filesystem.class' => 'Symfony\\Component\\Filesystem\\Filesystem',
            'cache_warmer.class' => 'Symfony\\Component\\HttpKernel\\CacheWarmer\\CacheWarmerAggregate',
            'cache_clearer.class' => 'Symfony\\Component\\HttpKernel\\CacheClearer\\ChainCacheClearer',
            'file_locator.class' => 'Symfony\\Component\\HttpKernel\\Config\\FileLocator',
            'uri_signer.class' => 'Symfony\\Component\\HttpKernel\\UriSigner',
            'fragment.handler.class' => 'Symfony\\Component\\HttpKernel\\Fragment\\FragmentHandler',
            'fragment.renderer.inline.class' => 'Symfony\\Component\\HttpKernel\\Fragment\\InlineFragmentRenderer',
            'fragment.renderer.hinclude.class' => 'Symfony\\Bundle\\FrameworkBundle\\Fragment\\ContainerAwareHIncludeFragmentRenderer',
            'fragment.renderer.hinclude.global_template' => NULL,
            'fragment.path' => '/_fragment',
            'translator.class' => 'Symfony\\Bundle\\FrameworkBundle\\Translation\\Translator',
            'translator.identity.class' => 'Symfony\\Component\\Translation\\IdentityTranslator',
            'translator.selector.class' => 'Symfony\\Component\\Translation\\MessageSelector',
            'translation.loader.php.class' => 'Symfony\\Component\\Translation\\Loader\\PhpFileLoader',
            'translation.loader.yml.class' => 'Symfony\\Component\\Translation\\Loader\\YamlFileLoader',
            'translation.loader.xliff.class' => 'Symfony\\Component\\Translation\\Loader\\XliffFileLoader',
            'translation.loader.po.class' => 'Symfony\\Component\\Translation\\Loader\\PoFileLoader',
            'translation.loader.mo.class' => 'Symfony\\Component\\Translation\\Loader\\MoFileLoader',
            'translation.loader.qt.class' => 'Symfony\\Component\\Translation\\Loader\\QtFileLoader',
            'translation.loader.csv.class' => 'Symfony\\Component\\Translation\\Loader\\CsvFileLoader',
            'translation.loader.res.class' => 'Symfony\\Component\\Translation\\Loader\\IcuResFileLoader',
            'translation.loader.dat.class' => 'Symfony\\Component\\Translation\\Loader\\IcuDatFileLoader',
            'translation.loader.ini.class' => 'Symfony\\Component\\Translation\\Loader\\IniFileLoader',
            'translation.dumper.php.class' => 'Symfony\\Component\\Translation\\Dumper\\PhpFileDumper',
            'translation.dumper.xliff.class' => 'Symfony\\Component\\Translation\\Dumper\\XliffFileDumper',
            'translation.dumper.po.class' => 'Symfony\\Component\\Translation\\Dumper\\PoFileDumper',
            'translation.dumper.mo.class' => 'Symfony\\Component\\Translation\\Dumper\\MoFileDumper',
            'translation.dumper.yml.class' => 'Symfony\\Component\\Translation\\Dumper\\YamlFileDumper',
            'translation.dumper.qt.class' => 'Symfony\\Component\\Translation\\Dumper\\QtFileDumper',
            'translation.dumper.csv.class' => 'Symfony\\Component\\Translation\\Dumper\\CsvFileDumper',
            'translation.dumper.ini.class' => 'Symfony\\Component\\Translation\\Dumper\\IniFileDumper',
            'translation.dumper.res.class' => 'Symfony\\Component\\Translation\\Dumper\\IcuResFileDumper',
            'translation.extractor.php.class' => 'Symfony\\Bundle\\FrameworkBundle\\Translation\\PhpExtractor',
            'translation.loader.class' => 'Symfony\\Bundle\\FrameworkBundle\\Translation\\TranslationLoader',
            'translation.extractor.class' => 'Symfony\\Component\\Translation\\Extractor\\ChainExtractor',
            'translation.writer.class' => 'Symfony\\Component\\Translation\\Writer\\TranslationWriter',
            'debug.errors_logger_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\ErrorsLoggerListener',
            'debug.event_dispatcher.class' => 'Symfony\\Component\\HttpKernel\\Debug\\TraceableEventDispatcher',
            'debug.stopwatch.class' => 'Symfony\\Component\\Stopwatch\\Stopwatch',
            'debug.container.dump' => '/srv/civix/app/cache/dev/appDevDebugProjectContainer.xml',
            'debug.controller_resolver.class' => 'Symfony\\Component\\HttpKernel\\Controller\\TraceableControllerResolver',
            'kernel.secret' => 'ThisTokenIsNotSoSecretChangeIt',
            'kernel.http_method_override' => true,
            'kernel.trusted_hosts' => array(

            ),
            'kernel.trusted_proxies' => array(

            ),
            'kernel.default_locale' => 'en',
            'session.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Session',
            'session.flashbag.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Flash\\FlashBag',
            'session.attribute_bag.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Attribute\\AttributeBag',
            'session.storage.native.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\NativeSessionStorage',
            'session.storage.php_bridge.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\PhpBridgeSessionStorage',
            'session.storage.mock_file.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\MockFileSessionStorage',
            'session.handler.native_file.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\NativeFileSessionHandler',
            'session_listener.class' => 'Symfony\\Bundle\\FrameworkBundle\\EventListener\\SessionListener',
            'session.storage.options' => array(

            ),
            'session.save_path' => '/srv/civix/app/cache/dev/sessions',
            'form.resolved_type_factory.class' => 'Symfony\\Component\\Form\\ResolvedFormTypeFactory',
            'form.registry.class' => 'Symfony\\Component\\Form\\FormRegistry',
            'form.factory.class' => 'Symfony\\Component\\Form\\FormFactory',
            'form.extension.class' => 'Symfony\\Component\\Form\\Extension\\DependencyInjection\\DependencyInjectionExtension',
            'form.type_guesser.validator.class' => 'Symfony\\Component\\Form\\Extension\\Validator\\ValidatorTypeGuesser',
            'property_accessor.class' => 'Symfony\\Component\\PropertyAccess\\PropertyAccessor',
            'form.csrf_provider.class' => 'Symfony\\Component\\Form\\Extension\\Csrf\\CsrfProvider\\SessionCsrfProvider',
            'form.type_extension.csrf.enabled' => true,
            'form.type_extension.csrf.field_name' => '_token',
            'templating.engine.delegating.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\DelegatingEngine',
            'templating.name_parser.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\TemplateNameParser',
            'templating.filename_parser.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\TemplateFilenameParser',
            'templating.cache_warmer.template_paths.class' => 'Symfony\\Bundle\\FrameworkBundle\\CacheWarmer\\TemplatePathsCacheWarmer',
            'templating.locator.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Loader\\TemplateLocator',
            'templating.loader.filesystem.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Loader\\FilesystemLoader',
            'templating.loader.cache.class' => 'Symfony\\Component\\Templating\\Loader\\CacheLoader',
            'templating.loader.chain.class' => 'Symfony\\Component\\Templating\\Loader\\ChainLoader',
            'templating.finder.class' => 'Symfony\\Bundle\\FrameworkBundle\\CacheWarmer\\TemplateFinder',
            'templating.engine.php.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\PhpEngine',
            'templating.helper.slots.class' => 'Symfony\\Component\\Templating\\Helper\\SlotsHelper',
            'templating.helper.assets.class' => 'Symfony\\Component\\Templating\\Helper\\CoreAssetsHelper',
            'templating.helper.actions.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\ActionsHelper',
            'templating.helper.router.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\RouterHelper',
            'templating.helper.request.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\RequestHelper',
            'templating.helper.session.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\SessionHelper',
            'templating.helper.code.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\CodeHelper',
            'templating.helper.translator.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\TranslatorHelper',
            'templating.helper.form.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\FormHelper',
            'templating.form.engine.class' => 'Symfony\\Component\\Form\\Extension\\Templating\\TemplatingRendererEngine',
            'templating.form.renderer.class' => 'Symfony\\Component\\Form\\FormRenderer',
            'templating.globals.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\GlobalVariables',
            'templating.asset.path_package.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Asset\\PathPackage',
            'templating.asset.url_package.class' => 'Symfony\\Component\\Templating\\Asset\\UrlPackage',
            'templating.asset.package_factory.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Asset\\PackageFactory',
            'templating.helper.code.file_link_format' => NULL,
            'templating.helper.form.resources' => array(
                0 => 'FrameworkBundle:Form',
            ),
            'templating.debugger.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Debugger',
            'debug.templating.engine.php.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\TimedPhpEngine',
            'templating.loader.cache.path' => NULL,
            'templating.engines' => array(
                0 => 'twig',
            ),
            'validator.class' => 'Symfony\\Component\\Validator\\Validator',
            'validator.mapping.class_metadata_factory.class' => 'Symfony\\Component\\Validator\\Mapping\\ClassMetadataFactory',
            'validator.mapping.cache.apc.class' => 'Symfony\\Component\\Validator\\Mapping\\Cache\\ApcCache',
            'validator.mapping.cache.prefix' => '',
            'validator.mapping.loader.loader_chain.class' => 'Symfony\\Component\\Validator\\Mapping\\Loader\\LoaderChain',
            'validator.mapping.loader.static_method_loader.class' => 'Symfony\\Component\\Validator\\Mapping\\Loader\\StaticMethodLoader',
            'validator.mapping.loader.annotation_loader.class' => 'Symfony\\Component\\Validator\\Mapping\\Loader\\AnnotationLoader',
            'validator.mapping.loader.xml_files_loader.class' => 'Symfony\\Component\\Validator\\Mapping\\Loader\\XmlFilesLoader',
            'validator.mapping.loader.yaml_files_loader.class' => 'Symfony\\Component\\Validator\\Mapping\\Loader\\YamlFilesLoader',
            'validator.validator_factory.class' => 'Symfony\\Bundle\\FrameworkBundle\\Validator\\ConstraintValidatorFactory',
            'validator.mapping.loader.xml_files_loader.mapping_files' => array(
                0 => '/srv/civix/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/config/validation.xml',
            ),
            'validator.mapping.loader.yaml_files_loader.mapping_files' => array(

            ),
            'validator.translation_domain' => 'validators',
            'profiler.class' => 'Symfony\\Component\\HttpKernel\\Profiler\\Profiler',
            'profiler_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\ProfilerListener',
            'data_collector.config.class' => 'Symfony\\Component\\HttpKernel\\DataCollector\\ConfigDataCollector',
            'data_collector.request.class' => 'Symfony\\Component\\HttpKernel\\DataCollector\\RequestDataCollector',
            'data_collector.exception.class' => 'Symfony\\Component\\HttpKernel\\DataCollector\\ExceptionDataCollector',
            'data_collector.events.class' => 'Symfony\\Component\\HttpKernel\\DataCollector\\EventDataCollector',
            'data_collector.logger.class' => 'Symfony\\Component\\HttpKernel\\DataCollector\\LoggerDataCollector',
            'data_collector.time.class' => 'Symfony\\Component\\HttpKernel\\DataCollector\\TimeDataCollector',
            'data_collector.memory.class' => 'Symfony\\Component\\HttpKernel\\DataCollector\\MemoryDataCollector',
            'data_collector.router.class' => 'Symfony\\Bundle\\FrameworkBundle\\DataCollector\\RouterDataCollector',
            'profiler_listener.only_exceptions' => false,
            'profiler_listener.only_master_requests' => false,
            'profiler.storage.dsn' => 'file:/srv/civix/app/cache/dev/profiler',
            'profiler.storage.username' => '',
            'profiler.storage.password' => '',
            'profiler.storage.lifetime' => 86400,
            'router.class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\Router',
            'router.request_context.class' => 'Symfony\\Component\\Routing\\RequestContext',
            'routing.loader.class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\DelegatingLoader',
            'routing.resolver.class' => 'Symfony\\Component\\Config\\Loader\\LoaderResolver',
            'routing.loader.xml.class' => 'Symfony\\Component\\Routing\\Loader\\XmlFileLoader',
            'routing.loader.yml.class' => 'Symfony\\Component\\Routing\\Loader\\YamlFileLoader',
            'routing.loader.php.class' => 'Symfony\\Component\\Routing\\Loader\\PhpFileLoader',
            'router.options.generator_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator',
            'router.options.generator_base_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator',
            'router.options.generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\PhpGeneratorDumper',
            'router.options.matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher',
            'router.options.matcher_base_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher',
            'router.options.matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\PhpMatcherDumper',
            'router.cache_warmer.class' => 'Symfony\\Bundle\\FrameworkBundle\\CacheWarmer\\RouterCacheWarmer',
            'router.options.matcher.cache_class' => 'appDevUrlMatcher',
            'router.options.generator.cache_class' => 'appDevUrlGenerator',
            'router_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\RouterListener',
            'router.request_context.host' => 'localhost',
            'router.request_context.scheme' => 'http',
            'router.request_context.base_url' => '',
            'router.resource' => '/srv/civix/app/config/routing_dev.yml',
            'router.cache_class_prefix' => 'appDev',
            'request_listener.http_port' => 80,
            'request_listener.https_port' => 443,
            'annotations.reader.class' => 'Doctrine\\Common\\Annotations\\AnnotationReader',
            'annotations.cached_reader.class' => 'Doctrine\\Common\\Annotations\\CachedReader',
            'annotations.file_cache_reader.class' => 'Doctrine\\Common\\Annotations\\FileCacheReader',
            'security.context.class' => 'Symfony\\Component\\Security\\Core\\SecurityContext',
            'security.user_checker.class' => 'Symfony\\Component\\Security\\Core\\User\\UserChecker',
            'security.encoder_factory.generic.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\EncoderFactory',
            'security.encoder.digest.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\MessageDigestPasswordEncoder',
            'security.encoder.plain.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\PlaintextPasswordEncoder',
            'security.encoder.pbkdf2.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\Pbkdf2PasswordEncoder',
            'security.encoder.bcrypt.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\BCryptPasswordEncoder',
            'security.user.provider.in_memory.class' => 'Symfony\\Component\\Security\\Core\\User\\InMemoryUserProvider',
            'security.user.provider.in_memory.user.class' => 'Symfony\\Component\\Security\\Core\\User\\User',
            'security.user.provider.chain.class' => 'Symfony\\Component\\Security\\Core\\User\\ChainUserProvider',
            'security.authentication.trust_resolver.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\AuthenticationTrustResolver',
            'security.authentication.trust_resolver.anonymous_class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken',
            'security.authentication.trust_resolver.rememberme_class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken',
            'security.authentication.manager.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\AuthenticationProviderManager',
            'security.authentication.session_strategy.class' => 'Symfony\\Component\\Security\\Http\\Session\\SessionAuthenticationStrategy',
            'security.access.decision_manager.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\AccessDecisionManager',
            'security.access.simple_role_voter.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\RoleVoter',
            'security.access.authenticated_voter.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\AuthenticatedVoter',
            'security.access.role_hierarchy_voter.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\RoleHierarchyVoter',
            'security.firewall.class' => 'Symfony\\Component\\Security\\Http\\Firewall',
            'security.firewall.map.class' => 'Symfony\\Bundle\\SecurityBundle\\Security\\FirewallMap',
            'security.firewall.context.class' => 'Symfony\\Bundle\\SecurityBundle\\Security\\FirewallContext',
            'security.matcher.class' => 'Symfony\\Component\\HttpFoundation\\RequestMatcher',
            'security.role_hierarchy.class' => 'Symfony\\Component\\Security\\Core\\Role\\RoleHierarchy',
            'security.http_utils.class' => 'Symfony\\Component\\Security\\Http\\HttpUtils',
            'security.validator.user_password.class' => 'Symfony\\Component\\Security\\Core\\Validator\\Constraints\\UserPasswordValidator',
            'security.authentication.retry_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\RetryAuthenticationEntryPoint',
            'security.channel_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\ChannelListener',
            'security.authentication.form_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\FormAuthenticationEntryPoint',
            'security.authentication.listener.form.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\UsernamePasswordFormAuthenticationListener',
            'security.authentication.listener.basic.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\BasicAuthenticationListener',
            'security.authentication.basic_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\BasicAuthenticationEntryPoint',
            'security.authentication.listener.digest.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\DigestAuthenticationListener',
            'security.authentication.digest_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\DigestAuthenticationEntryPoint',
            'security.authentication.listener.x509.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\X509AuthenticationListener',
            'security.authentication.listener.anonymous.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\AnonymousAuthenticationListener',
            'security.authentication.switchuser_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\SwitchUserListener',
            'security.logout_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\LogoutListener',
            'security.logout.handler.session.class' => 'Symfony\\Component\\Security\\Http\\Logout\\SessionLogoutHandler',
            'security.logout.handler.cookie_clearing.class' => 'Symfony\\Component\\Security\\Http\\Logout\\CookieClearingLogoutHandler',
            'security.logout.success_handler.class' => 'Symfony\\Component\\Security\\Http\\Logout\\DefaultLogoutSuccessHandler',
            'security.access_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\AccessListener',
            'security.access_map.class' => 'Symfony\\Component\\Security\\Http\\AccessMap',
            'security.exception_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\ExceptionListener',
            'security.context_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\ContextListener',
            'security.authentication.provider.dao.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\DaoAuthenticationProvider',
            'security.authentication.provider.pre_authenticated.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\PreAuthenticatedAuthenticationProvider',
            'security.authentication.provider.anonymous.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\AnonymousAuthenticationProvider',
            'security.authentication.success_handler.class' => 'Symfony\\Component\\Security\\Http\\Authentication\\DefaultAuthenticationSuccessHandler',
            'security.authentication.failure_handler.class' => 'Symfony\\Component\\Security\\Http\\Authentication\\DefaultAuthenticationFailureHandler',
            'security.authentication.provider.rememberme.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\RememberMeAuthenticationProvider',
            'security.authentication.listener.rememberme.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\RememberMeListener',
            'security.rememberme.token.provider.in_memory.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\RememberMe\\InMemoryTokenProvider',
            'security.authentication.rememberme.services.persistent.class' => 'Symfony\\Component\\Security\\Http\\RememberMe\\PersistentTokenBasedRememberMeServices',
            'security.authentication.rememberme.services.simplehash.class' => 'Symfony\\Component\\Security\\Http\\RememberMe\\TokenBasedRememberMeServices',
            'security.rememberme.response_listener.class' => 'Symfony\\Component\\Security\\Http\\RememberMe\\ResponseListener',
            'templating.helper.logout_url.class' => 'Symfony\\Bundle\\SecurityBundle\\Templating\\Helper\\LogoutUrlHelper',
            'templating.helper.security.class' => 'Symfony\\Bundle\\SecurityBundle\\Templating\\Helper\\SecurityHelper',
            'twig.extension.logout_url.class' => 'Symfony\\Bundle\\SecurityBundle\\Twig\\Extension\\LogoutUrlExtension',
            'twig.extension.security.class' => 'Symfony\\Bridge\\Twig\\Extension\\SecurityExtension',
            'data_collector.security.class' => 'Symfony\\Bundle\\SecurityBundle\\DataCollector\\SecurityDataCollector',
            'security.access.denied_url' => NULL,
            'security.authentication.manager.erase_credentials' => true,
            'security.authentication.session_strategy.strategy' => 'migrate',
            'security.access.always_authenticate_before_granting' => false,
            'security.authentication.hide_user_not_found' => true,
            'security.role_hierarchy.roles' => array(

            ),
            'twig.class' => 'Twig_Environment',
            'twig.loader.filesystem.class' => 'Symfony\\Bundle\\TwigBundle\\Loader\\FilesystemLoader',
            'twig.loader.chain.class' => 'Twig_Loader_Chain',
            'templating.engine.twig.class' => 'Symfony\\Bundle\\TwigBundle\\TwigEngine',
            'twig.cache_warmer.class' => 'Symfony\\Bundle\\TwigBundle\\CacheWarmer\\TemplateCacheCacheWarmer',
            'twig.extension.trans.class' => 'Symfony\\Bridge\\Twig\\Extension\\TranslationExtension',
            'twig.extension.assets.class' => 'Symfony\\Bundle\\TwigBundle\\Extension\\AssetsExtension',
            'twig.extension.actions.class' => 'Symfony\\Bundle\\TwigBundle\\Extension\\ActionsExtension',
            'twig.extension.code.class' => 'Symfony\\Bridge\\Twig\\Extension\\CodeExtension',
            'twig.extension.routing.class' => 'Symfony\\Bridge\\Twig\\Extension\\RoutingExtension',
            'twig.extension.yaml.class' => 'Symfony\\Bridge\\Twig\\Extension\\YamlExtension',
            'twig.extension.form.class' => 'Symfony\\Bridge\\Twig\\Extension\\FormExtension',
            'twig.extension.httpkernel.class' => 'Symfony\\Bridge\\Twig\\Extension\\HttpKernelExtension',
            'twig.form.engine.class' => 'Symfony\\Bridge\\Twig\\Form\\TwigRendererEngine',
            'twig.form.renderer.class' => 'Symfony\\Bridge\\Twig\\Form\\TwigRenderer',
            'twig.translation.extractor.class' => 'Symfony\\Bridge\\Twig\\Translation\\TwigExtractor',
            'twig.exception_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\ExceptionListener',
            'twig.controller.exception.class' => 'Symfony\\Bundle\\TwigBundle\\Controller\\ExceptionController',
            'twig.exception_listener.controller' => 'twig.controller.exception:showAction',
            'twig.form.resources' => array(
                0 => 'form_div_layout.html.twig',
                1 => 'MopaBootstrapBundle:Form:fields.html.twig',
                2 => 'CivixFrontBundle::fields.html.twig',
                3 => 'CivixFrontBundle::imageField.html.twig',
                4 => 'EWZRecaptchaBundle:Form:ewz_recaptcha_widget.html.twig',
            ),
            'debug.templating.engine.twig.class' => 'Symfony\\Bundle\\TwigBundle\\Debug\\TimedTwigEngine',
            'twig.options' => array(
                'debug' => true,
                'strict_variables' => true,
                'exception_controller' => 'twig.controller.exception:showAction',
                'autoescape_service' => NULL,
                'autoescape_service_method' => NULL,
                'cache' => '/srv/civix/app/cache/dev/twig',
                'charset' => 'UTF-8',
                'paths' => array(

                ),
            ),
            'monolog.logger.class' => 'Symfony\\Bridge\\Monolog\\Logger',
            'monolog.gelf.publisher.class' => 'Gelf\\MessagePublisher',
            'monolog.handler.stream.class' => 'Monolog\\Handler\\StreamHandler',
            'monolog.handler.group.class' => 'Monolog\\Handler\\GroupHandler',
            'monolog.handler.buffer.class' => 'Monolog\\Handler\\BufferHandler',
            'monolog.handler.rotating_file.class' => 'Monolog\\Handler\\RotatingFileHandler',
            'monolog.handler.syslog.class' => 'Monolog\\Handler\\SyslogHandler',
            'monolog.handler.null.class' => 'Monolog\\Handler\\NullHandler',
            'monolog.handler.test.class' => 'Monolog\\Handler\\TestHandler',
            'monolog.handler.gelf.class' => 'Monolog\\Handler\\GelfHandler',
            'monolog.handler.firephp.class' => 'Symfony\\Bridge\\Monolog\\Handler\\FirePHPHandler',
            'monolog.handler.chromephp.class' => 'Symfony\\Bridge\\Monolog\\Handler\\ChromePhpHandler',
            'monolog.handler.debug.class' => 'Symfony\\Bridge\\Monolog\\Handler\\DebugHandler',
            'monolog.handler.swift_mailer.class' => 'Monolog\\Handler\\SwiftMailerHandler',
            'monolog.handler.native_mailer.class' => 'Monolog\\Handler\\NativeMailerHandler',
            'monolog.handler.socket.class' => 'Monolog\\Handler\\SocketHandler',
            'monolog.handler.pushover.class' => 'Monolog\\Handler\\PushoverHandler',
            'monolog.handler.raven.class' => 'Monolog\\Handler\\RavenHandler',
            'monolog.handler.fingers_crossed.class' => 'Monolog\\Handler\\FingersCrossedHandler',
            'monolog.handler.fingers_crossed.error_level_activation_strategy.class' => 'Monolog\\Handler\\FingersCrossed\\ErrorLevelActivationStrategy',
            'monolog.handlers_to_channels' => array(
                'monolog.handler.firephp' => NULL,
                'monolog.handler.pushsender' => array(
                    'type' => 'inclusive',
                    'elements' => array(
                        0 => 'pushsender',
                    ),
                ),
                'monolog.handler.main' => NULL,
            ),
            'swiftmailer.class' => 'Swift_Mailer',
            'swiftmailer.transport.sendmail.class' => 'Swift_Transport_SendmailTransport',
            'swiftmailer.transport.mail.class' => 'Swift_Transport_MailTransport',
            'swiftmailer.transport.failover.class' => 'Swift_Transport_FailoverTransport',
            'swiftmailer.plugin.redirecting.class' => 'Swift_Plugins_RedirectingPlugin',
            'swiftmailer.plugin.impersonate.class' => 'Swift_Plugins_ImpersonatePlugin',
            'swiftmailer.plugin.messagelogger.class' => 'Swift_Plugins_MessageLogger',
            'swiftmailer.plugin.antiflood.class' => 'Swift_Plugins_AntiFloodPlugin',
            'swiftmailer.transport.smtp.class' => 'Swift_Transport_EsmtpTransport',
            'swiftmailer.plugin.blackhole.class' => 'Swift_Plugins_BlackholePlugin',
            'swiftmailer.spool.file.class' => 'Swift_FileSpool',
            'swiftmailer.spool.memory.class' => 'Swift_MemorySpool',
            'swiftmailer.email_sender.listener.class' => 'Symfony\\Bundle\\SwiftmailerBundle\\EventListener\\EmailSenderListener',
            'swiftmailer.data_collector.class' => 'Symfony\\Bundle\\SwiftmailerBundle\\DataCollector\\MessageDataCollector',
            'swiftmailer.mailer.default.transport.name' => 'smtp',
            'swiftmailer.mailer.default.delivery.enabled' => true,
            'swiftmailer.mailer.default.transport.smtp.encryption' => 'tls',
            'swiftmailer.mailer.default.transport.smtp.port' => 25,
            'swiftmailer.mailer.default.transport.smtp.host' => 'email-smtp.us-east-1.amazonaws.com',
            'swiftmailer.mailer.default.transport.smtp.username' => 'AKIAIR3T4SCMIWOTAOWA',
            'swiftmailer.mailer.default.transport.smtp.password' => 'Ap3rzxOaji8sJUduNAp1+yQf3jTFXudxsivCg/S760lE',
            'swiftmailer.mailer.default.transport.smtp.auth_mode' => NULL,
            'swiftmailer.mailer.default.transport.smtp.timeout' => 30,
            'swiftmailer.mailer.default.transport.smtp.source_ip' => NULL,
            'swiftmailer.spool.default.memory.path' => '/srv/civix/app/cache/dev/swiftmailer/spool/default',
            'swiftmailer.mailer.default.spool.enabled' => true,
            'swiftmailer.mailer.default.plugin.impersonate' => NULL,
            'swiftmailer.mailer.default.single_address' => NULL,
            'swiftmailer.spool.enabled' => true,
            'swiftmailer.delivery.enabled' => true,
            'swiftmailer.single_address' => NULL,
            'swiftmailer.mailers' => array(
                'default' => 'swiftmailer.mailer.default',
            ),
            'swiftmailer.default_mailer' => 'default',
            'assetic.asset_factory.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\AssetFactory',
            'assetic.asset_manager.class' => 'Assetic\\Factory\\LazyAssetManager',
            'assetic.asset_manager_cache_warmer.class' => 'Symfony\\Bundle\\AsseticBundle\\CacheWarmer\\AssetManagerCacheWarmer',
            'assetic.cached_formula_loader.class' => 'Assetic\\Factory\\Loader\\CachedFormulaLoader',
            'assetic.config_cache.class' => 'Assetic\\Cache\\ConfigCache',
            'assetic.config_loader.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Loader\\ConfigurationLoader',
            'assetic.config_resource.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Resource\\ConfigurationResource',
            'assetic.coalescing_directory_resource.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Resource\\CoalescingDirectoryResource',
            'assetic.directory_resource.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Resource\\DirectoryResource',
            'assetic.filter_manager.class' => 'Symfony\\Bundle\\AsseticBundle\\FilterManager',
            'assetic.worker.ensure_filter.class' => 'Assetic\\Factory\\Worker\\EnsureFilterWorker',
            'assetic.value_supplier.class' => 'Symfony\\Bundle\\AsseticBundle\\DefaultValueSupplier',
            'assetic.node.paths' => array(

            ),
            'assetic.cache_dir' => '/srv/civix/app/cache/dev/assetic',
            'assetic.bundles' => array(
                0 => 'FrameworkBundle',
                1 => 'SecurityBundle',
                2 => 'TwigBundle',
                3 => 'MonologBundle',
                4 => 'SwiftmailerBundle',
                5 => 'AsseticBundle',
                6 => 'DoctrineBundle',
                7 => 'DoctrineFixturesBundle',
                8 => 'DoctrineMigrationsBundle',
                9 => 'SensioFrameworkExtraBundle',
                10 => 'JMSAopBundle',
                11 => 'JMSDiExtraBundle',
                12 => 'JMSSecurityExtraBundle',
                13 => 'JMSSerializerBundle',
                14 => 'MopaBootstrapBundle',
                15 => 'KnpMenuBundle',
                16 => 'KnpPaginatorBundle',
                17 => 'EWZRecaptchaBundle',
                18 => 'KnpGaufretteBundle',
                19 => 'VichUploaderBundle',
                20 => 'RMSPushNotificationsBundle',
                21 => 'OldSoundRabbitMqBundle',
                22 => 'CivixFrontBundle',
                23 => 'CivixCoreBundle',
                24 => 'CivixApiBundle',
                25 => 'CivixBalancedBundle',
                26 => 'WebProfilerBundle',
                27 => 'SensioDistributionBundle',
                28 => 'SensioGeneratorBundle',
                29 => 'NelmioApiDocBundle',
                30 => 'CivixLoadBundle',
            ),
            'assetic.twig_extension.class' => 'Symfony\\Bundle\\AsseticBundle\\Twig\\AsseticExtension',
            'assetic.twig_formula_loader.class' => 'Assetic\\Extension\\Twig\\TwigFormulaLoader',
            'assetic.helper.dynamic.class' => 'Symfony\\Bundle\\AsseticBundle\\Templating\\DynamicAsseticHelper',
            'assetic.helper.static.class' => 'Symfony\\Bundle\\AsseticBundle\\Templating\\StaticAsseticHelper',
            'assetic.php_formula_loader.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Loader\\AsseticHelperFormulaLoader',
            'assetic.debug' => true,
            'assetic.use_controller' => false,
            'assetic.enable_profiler' => false,
            'assetic.read_from' => '/srv/civix/app/../web',
            'assetic.write_to' => '/srv/civix/app/../web',
            'assetic.variables' => array(

            ),
            'assetic.java.bin' => '/usr/bin/java',
            'assetic.node.bin' => '/usr/bin/node',
            'assetic.ruby.bin' => '/usr/bin/ruby',
            'assetic.sass.bin' => '/usr/bin/sass',
            'assetic.filter.lessphp.class' => 'Assetic\\Filter\\LessphpFilter',
            'assetic.filter.lessphp.presets' => array(

            ),
            'assetic.filter.lessphp.paths' => array(

            ),
            'assetic.filter.lessphp.formatter' => NULL,
            'assetic.filter.lessphp.preserve_comments' => NULL,
            'assetic.filter.cssrewrite.class' => 'Assetic\\Filter\\CssRewriteFilter',
            'assetic.twig_extension.functions' => array(

            ),
            'doctrine.dbal.logger.chain.class' => 'Doctrine\\DBAL\\Logging\\LoggerChain',
            'doctrine.dbal.logger.profiling.class' => 'Doctrine\\DBAL\\Logging\\DebugStack',
            'doctrine.dbal.logger.class' => 'Symfony\\Bridge\\Doctrine\\Logger\\DbalLogger',
            'doctrine.dbal.configuration.class' => 'Doctrine\\DBAL\\Configuration',
            'doctrine.data_collector.class' => 'Doctrine\\Bundle\\DoctrineBundle\\DataCollector\\DoctrineDataCollector',
            'doctrine.dbal.connection.event_manager.class' => 'Symfony\\Bridge\\Doctrine\\ContainerAwareEventManager',
            'doctrine.dbal.connection_factory.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ConnectionFactory',
            'doctrine.dbal.events.mysql_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\MysqlSessionInit',
            'doctrine.dbal.events.oracle_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\OracleSessionInit',
            'doctrine.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Registry',
            'doctrine.entity_managers' => array(
                'default' => 'doctrine.orm.default_entity_manager',
            ),
            'doctrine.default_entity_manager' => 'default',
            'doctrine.dbal.connection_factory.types' => array(

            ),
            'doctrine.connections' => array(
                'default' => 'doctrine.dbal.default_connection',
            ),
            'doctrine.default_connection' => 'default',
            'doctrine.orm.configuration.class' => 'Doctrine\\ORM\\Configuration',
            'doctrine.orm.entity_manager.class' => 'Doctrine\\ORM\\EntityManager',
            'doctrine.orm.manager_configurator.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ManagerConfigurator',
            'doctrine.orm.cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine.orm.cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine.orm.cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine.orm.cache.memcache_host' => 'localhost',
            'doctrine.orm.cache.memcache_port' => 11211,
            'doctrine.orm.cache.memcache_instance.class' => 'Memcache',
            'doctrine.orm.cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine.orm.cache.memcached_host' => 'localhost',
            'doctrine.orm.cache.memcached_port' => 11211,
            'doctrine.orm.cache.memcached_instance.class' => 'Memcached',
            'doctrine.orm.cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine.orm.cache.redis_host' => 'localhost',
            'doctrine.orm.cache.redis_port' => 6379,
            'doctrine.orm.cache.redis_instance.class' => 'Redis',
            'doctrine.orm.cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine.orm.cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine.orm.cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine.orm.metadata.driver_chain.class' => 'Doctrine\\ORM\\Mapping\\Driver\\DriverChain',
            'doctrine.orm.metadata.annotation.class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
            'doctrine.orm.metadata.xml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedXmlDriver',
            'doctrine.orm.metadata.yml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedYamlDriver',
            'doctrine.orm.metadata.php.class' => 'Doctrine\\ORM\\Mapping\\Driver\\PHPDriver',
            'doctrine.orm.metadata.staticphp.class' => 'Doctrine\\ORM\\Mapping\\Driver\\StaticPHPDriver',
            'doctrine.orm.proxy_cache_warmer.class' => 'Symfony\\Bridge\\Doctrine\\CacheWarmer\\ProxyCacheWarmer',
            'form.type_guesser.doctrine.class' => 'Symfony\\Bridge\\Doctrine\\Form\\DoctrineOrmTypeGuesser',
            'doctrine.orm.validator.unique.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator',
            'doctrine.orm.validator_initializer.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\DoctrineInitializer',
            'doctrine.orm.security.user.provider.class' => 'Symfony\\Bridge\\Doctrine\\Security\\User\\EntityUserProvider',
            'doctrine.orm.listeners.resolve_target_entity.class' => 'Doctrine\\ORM\\Tools\\ResolveTargetEntityListener',
            'doctrine.orm.naming_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultNamingStrategy',
            'doctrine.orm.naming_strategy.underscore.class' => 'Doctrine\\ORM\\Mapping\\UnderscoreNamingStrategy',
            'doctrine.orm.auto_generate_proxy_classes' => true,
            'doctrine.orm.proxy_dir' => '/srv/civix/app/cache/dev/doctrine/orm/Proxies',
            'doctrine.orm.proxy_namespace' => 'Proxies',
            'doctrine_migrations.dir_name' => '/srv/civix/app/DoctrineMigrations',
            'doctrine_migrations.namespace' => 'Application\\Migrations',
            'doctrine_migrations.table_name' => 'migration_versions',
            'doctrine_migrations.name' => 'Application Migrations',
            'sensio_framework_extra.view.guesser.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Templating\\TemplateGuesser',
            'sensio_framework_extra.controller.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ControllerListener',
            'sensio_framework_extra.routing.loader.annot_dir.class' => 'Symfony\\Component\\Routing\\Loader\\AnnotationDirectoryLoader',
            'sensio_framework_extra.routing.loader.annot_file.class' => 'Symfony\\Component\\Routing\\Loader\\AnnotationFileLoader',
            'sensio_framework_extra.routing.loader.annot_class.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Routing\\AnnotatedRouteControllerLoader',
            'sensio_framework_extra.converter.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ParamConverterListener',
            'sensio_framework_extra.converter.manager.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\ParamConverterManager',
            'sensio_framework_extra.converter.doctrine.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\DoctrineParamConverter',
            'sensio_framework_extra.converter.datetime.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\DateTimeParamConverter',
            'sensio_framework_extra.view.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\TemplateListener',
            'jms_aop.cache_dir' => '/srv/civix/app/cache/dev/jms_aop',
            'jms_aop.interceptor_loader.class' => 'JMS\\AopBundle\\Aop\\InterceptorLoader',
            'jms_di_extra.metadata.driver.annotation_driver.class' => 'JMS\\DiExtraBundle\\Metadata\\Driver\\AnnotationDriver',
            'jms_di_extra.metadata.driver.configured_controller_injections.class' => 'JMS\\DiExtraBundle\\Metadata\\Driver\\ConfiguredControllerInjectionsDriver',
            'jms_di_extra.metadata.driver.lazy_loading_driver.class' => 'Metadata\\Driver\\LazyLoadingDriver',
            'jms_di_extra.metadata.metadata_factory.class' => 'Metadata\\MetadataFactory',
            'jms_di_extra.metadata.cache.file_cache.class' => 'Metadata\\Cache\\FileCache',
            'jms_di_extra.metadata.converter.class' => 'JMS\\DiExtraBundle\\Metadata\\MetadataConverter',
            'jms_di_extra.controller_resolver.class' => 'JMS\\DiExtraBundle\\HttpKernel\\ControllerResolver',
            'jms_di_extra.controller_injectors_warmer.class' => 'JMS\\DiExtraBundle\\HttpKernel\\ControllerInjectorsWarmer',
            'jms_di_extra.all_bundles' => false,
            'jms_di_extra.bundles' => array(

            ),
            'jms_di_extra.directories' => array(

            ),
            'jms_di_extra.cache_dir' => '/srv/civix/app/cache/dev/jms_diextra',
            'jms_di_extra.disable_grep' => false,
            'jms_di_extra.doctrine_integration' => true,
            'jms_di_extra.cache_warmer.controller_file_blacklist' => array(

            ),
            'jms_di_extra.doctrine_integration.entity_manager.file' => '/srv/civix/app/cache/dev/jms_diextra/doctrine/EntityManager_56902dad9f9ff.php',
            'jms_di_extra.doctrine_integration.entity_manager.class' => 'EntityManager56902dad9f9ff_546a8d27f194334ee012bfe64f629947b07e4919\\__CG__\\Doctrine\\ORM\\EntityManager',
            'security.secured_services' => array(

            ),
            'security.access.method_interceptor.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Interception\\MethodSecurityInterceptor',
            'security.access.method_access_control' => array(

            ),
            'security.access.remembering_access_decision_manager.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\RememberingAccessDecisionManager',
            'security.access.run_as_manager.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\RunAsManager',
            'security.authentication.provider.run_as.class' => 'JMS\\SecurityExtraBundle\\Security\\Authentication\\Provider\\RunAsAuthenticationProvider',
            'security.run_as.key' => 'RunAsToken',
            'security.run_as.role_prefix' => 'ROLE_',
            'security.access.after_invocation_manager.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\AfterInvocation\\AfterInvocationManager',
            'security.access.after_invocation.acl_provider.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\AfterInvocation\\AclAfterInvocationProvider',
            'security.access.iddqd_voter.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Voter\\IddqdVoter',
            'security.extra.metadata_factory.class' => 'Metadata\\MetadataFactory',
            'security.extra.lazy_loading_driver.class' => 'Metadata\\Driver\\LazyLoadingDriver',
            'security.extra.driver_chain.class' => 'Metadata\\Driver\\DriverChain',
            'security.extra.annotation_driver.class' => 'JMS\\SecurityExtraBundle\\Metadata\\Driver\\AnnotationDriver',
            'security.extra.file_cache.class' => 'Metadata\\Cache\\FileCache',
            'security.access.secure_all_services' => false,
            'security.extra.cache_dir' => '/srv/civix/app/cache/dev/jms_security',
            'security.acl.permission_evaluator.class' => 'JMS\\SecurityExtraBundle\\Security\\Acl\\Expression\\PermissionEvaluator',
            'security.acl.has_permission_compiler.class' => 'JMS\\SecurityExtraBundle\\Security\\Acl\\Expression\\HasPermissionFunctionCompiler',
            'security.expressions.voter.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Expression\\LazyLoadingExpressionVoter',
            'security.expressions.handler.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Expression\\ContainerAwareExpressionHandler',
            'security.expressions.compiler.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Expression\\ExpressionCompiler',
            'security.expressions.expression.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Expression\\Expression',
            'security.expressions.variable_compiler.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Expression\\Compiler\\ContainerAwareVariableCompiler',
            'security.expressions.parameter_compiler.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Expression\\Compiler\\ParameterExpressionCompiler',
            'security.expressions.reverse_interpreter.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Expression\\ReverseInterpreter',
            'security.extra.config_driver.class' => 'JMS\\SecurityExtraBundle\\Metadata\\Driver\\ConfigDriver',
            'security.extra.twig_extension.class' => 'JMS\\SecurityExtraBundle\\Twig\\SecurityExtension',
            'security.authenticated_voter.disabled' => false,
            'security.role_voter.disabled' => false,
            'security.acl_voter.disabled' => false,
            'security.extra.iddqd_ignore_roles' => array(
                0 => 'ROLE_PREVIOUS_ADMIN',
            ),
            'security.iddqd_aliases' => array(

            ),
            'jms_serializer.metadata.file_locator.class' => 'Metadata\\Driver\\FileLocator',
            'jms_serializer.metadata.annotation_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\AnnotationDriver',
            'jms_serializer.metadata.chain_driver.class' => 'Metadata\\Driver\\DriverChain',
            'jms_serializer.metadata.yaml_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\YamlDriver',
            'jms_serializer.metadata.xml_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\XmlDriver',
            'jms_serializer.metadata.php_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\PhpDriver',
            'jms_serializer.metadata.doctrine_type_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\DoctrineTypeDriver',
            'jms_serializer.metadata.doctrine_phpcr_type_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\DoctrinePHPCRTypeDriver',
            'jms_serializer.metadata.lazy_loading_driver.class' => 'Metadata\\Driver\\LazyLoadingDriver',
            'jms_serializer.metadata.metadata_factory.class' => 'Metadata\\MetadataFactory',
            'jms_serializer.metadata.cache.file_cache.class' => 'Metadata\\Cache\\FileCache',
            'jms_serializer.event_dispatcher.class' => 'JMS\\Serializer\\EventDispatcher\\LazyEventDispatcher',
            'jms_serializer.camel_case_naming_strategy.class' => 'JMS\\Serializer\\Naming\\CamelCaseNamingStrategy',
            'jms_serializer.serialized_name_annotation_strategy.class' => 'JMS\\Serializer\\Naming\\SerializedNameAnnotationStrategy',
            'jms_serializer.cache_naming_strategy.class' => 'JMS\\Serializer\\Naming\\CacheNamingStrategy',
            'jms_serializer.doctrine_object_constructor.class' => 'JMS\\Serializer\\Construction\\DoctrineObjectConstructor',
            'jms_serializer.unserialize_object_constructor.class' => 'JMS\\Serializer\\Construction\\UnserializeObjectConstructor',
            'jms_serializer.version_exclusion_strategy.class' => 'JMS\\Serializer\\Exclusion\\VersionExclusionStrategy',
            'jms_serializer.serializer.class' => 'JMS\\Serializer\\Serializer',
            'jms_serializer.twig_extension.class' => 'JMS\\Serializer\\Twig\\SerializerExtension',
            'jms_serializer.templating.helper.class' => 'JMS\\SerializerBundle\\Templating\\SerializerHelper',
            'jms_serializer.json_serialization_visitor.class' => 'JMS\\Serializer\\JsonSerializationVisitor',
            'jms_serializer.json_serialization_visitor.options' => 0,
            'jms_serializer.json_deserialization_visitor.class' => 'JMS\\Serializer\\JsonDeserializationVisitor',
            'jms_serializer.xml_serialization_visitor.class' => 'JMS\\Serializer\\XmlSerializationVisitor',
            'jms_serializer.xml_deserialization_visitor.class' => 'JMS\\Serializer\\XmlDeserializationVisitor',
            'jms_serializer.xml_deserialization_visitor.doctype_whitelist' => array(

            ),
            'jms_serializer.yaml_serialization_visitor.class' => 'JMS\\Serializer\\YamlSerializationVisitor',
            'jms_serializer.handler_registry.class' => 'JMS\\Serializer\\Handler\\LazyHandlerRegistry',
            'jms_serializer.datetime_handler.class' => 'JMS\\Serializer\\Handler\\DateHandler',
            'jms_serializer.array_collection_handler.class' => 'JMS\\Serializer\\Handler\\ArrayCollectionHandler',
            'jms_serializer.php_collection_handler.class' => 'JMS\\Serializer\\Handler\\PhpCollectionHandler',
            'jms_serializer.form_error_handler.class' => 'JMS\\Serializer\\Handler\\FormErrorHandler',
            'jms_serializer.constraint_violation_handler.class' => 'JMS\\Serializer\\Handler\\ConstraintViolationHandler',
            'jms_serializer.doctrine_proxy_subscriber.class' => 'JMS\\Serializer\\EventDispatcher\\Subscriber\\DoctrineProxySubscriber',
            'jms_serializer.stopwatch_subscriber.class' => 'JMS\\SerializerBundle\\Serializer\\StopwatchEventSubscriber',
            'jms_serializer.infer_types_from_doctrine_metadata' => true,
            'mopa_bootstrap.form.templating' => 'MopaBootstrapBundle:Form:fields.html.twig',
            'mopa_bootstrap.form.horizontal_label_class' => 'col-lg-3',
            'mopa_bootstrap.form.horizontal_input_wrapper_class' => 'col-lg-9',
            'mopa_bootstrap.form.row_wrapper_class' => 'form-group',
            'mopa_bootstrap.form.render_fieldset' => true,
            'mopa_bootstrap.form.render_collection_item' => true,
            'mopa_bootstrap.form.show_legend' => true,
            'mopa_bootstrap.form.show_child_legend' => false,
            'mopa_bootstrap.form.checkbox_label' => 'both',
            'mopa_bootstrap.form.render_optional_text' => true,
            'mopa_bootstrap.form.errors_on_forms' => false,
            'mopa_bootstrap.form.render_required_asterisk' => false,
            'mopa_bootstrap.form.error_type' => NULL,
            'mopa_bootstrap.form.tooltip.icon' => 'icon-info-sign',
            'mopa_bootstrap.form.tooltip.placement' => 'top',
            'mopa_bootstrap.form.tabs.class' => 'nav nav-tabs',
            'mopa_bootstrap.form.popover.icon' => 'icon-info-sign',
            'mopa_bootstrap.form.popover.placement' => 'top',
            'mopa_bootstrap.form.collection.widget_remove_btn' => array(
                'attr' => array(
                    'class' => 'btn',
                ),
                'icon' => NULL,
                'icon_color' => NULL,
            ),
            'mopa_bootstrap.form.collection.widget_add_btn' => array(
                'attr' => array(
                    'class' => 'btn',
                ),
                'icon' => NULL,
                'icon_color' => NULL,
            ),
            'mopa_bootstrap.navbar.generic' => 'Mopa\\Bundle\\BootstrapBundle\\Navbar\\GenericNavbar',
            'mopa_bootstrap.navbar.template' => 'MopaBootstrapBundle:Navbar:navbar.html.twig',
            'knp_menu.factory.class' => 'Knp\\Menu\\MenuFactory',
            'knp_menu.factory_extension.routing.class' => 'Knp\\Menu\\Integration\\Symfony\\RoutingExtension',
            'knp_menu.helper.class' => 'Knp\\Menu\\Twig\\Helper',
            'knp_menu.matcher.class' => 'Knp\\Menu\\Matcher\\Matcher',
            'knp_menu.menu_provider.chain.class' => 'Knp\\Menu\\Provider\\ChainProvider',
            'knp_menu.menu_provider.container_aware.class' => 'Knp\\Bundle\\MenuBundle\\Provider\\ContainerAwareProvider',
            'knp_menu.menu_provider.builder_alias.class' => 'Knp\\Bundle\\MenuBundle\\Provider\\BuilderAliasProvider',
            'knp_menu.renderer_provider.class' => 'Knp\\Bundle\\MenuBundle\\Renderer\\ContainerAwareProvider',
            'knp_menu.renderer.list.class' => 'Knp\\Menu\\Renderer\\ListRenderer',
            'knp_menu.renderer.list.options' => array(

            ),
            'knp_menu.listener.voters.class' => 'Knp\\Bundle\\MenuBundle\\EventListener\\VoterInitializerListener',
            'knp_menu.voter.router.class' => 'Knp\\Menu\\Matcher\\Voter\\RouteVoter',
            'knp_menu.twig.extension.class' => 'Knp\\Menu\\Twig\\MenuExtension',
            'knp_menu.renderer.twig.class' => 'Knp\\Menu\\Renderer\\TwigRenderer',
            'knp_menu.renderer.twig.options' => array(

            ),
            'knp_menu.renderer.twig.template' => 'knp_menu.html.twig',
            'knp_menu.default_renderer' => 'twig',
            'knp_paginator.class' => 'Knp\\Component\\Pager\\Paginator',
            'knp_paginator.templating.helper.pagination.class' => 'Knp\\Bundle\\PaginatorBundle\\Templating\\PaginationHelper',
            'knp_paginator.helper.processor.class' => 'Knp\\Bundle\\PaginatorBundle\\Helper\\Processor',
            'knp_paginator.template.pagination' => 'MopaBootstrapBundle:Pagination:sliding.html.twig',
            'knp_paginator.template.filtration' => 'KnpPaginatorBundle:Pagination:filtration.html.twig',
            'knp_paginator.template.sortable' => 'KnpPaginatorBundle:Pagination:sortable_link.html.twig',
            'knp_paginator.page_range' => 5,
            'ewz_recaptcha.form.type.class' => 'EWZ\\Bundle\\RecaptchaBundle\\Form\\Type\\RecaptchaType',
            'ewz_recaptcha.validator.true.class' => 'EWZ\\Bundle\\RecaptchaBundle\\Validator\\Constraints\\TrueValidator',
            'ewz_recaptcha.public_key' => '6Ld7POMSAAAAAJSCpXu9X_LAMwxMVCRjDWYOW1D9',
            'ewz_recaptcha.private_key' => '6Ld7POMSAAAAAEvKq_cq1UnxITF9Vbogc8bjtVb4',
            'ewz_recaptcha.locale_key' => 'kernel.default_locale',
            'ewz_recaptcha.enabled' => true,
            'knp_gaufrette.filesystem_map.class' => 'Knp\\Bundle\\GaufretteBundle\\FilesystemMap',
            'knp_gaufrette.stream_wrapper.protocol' => 'gaufrette',
            'knp_gaufrette.stream_wrapper.filesystems' => array(

            ),
            'vich_uploader.mappings' => array(
                'avatar_image' => array(
                    'uri_prefix' => 'http://stagingpowerline.s3-website-us-east-1.amazonaws.com/avatars',
                    'upload_destination' => 'avatar_image_fs',
                    'namer' => 'vich_uploader.namer_uniqid',
                    'directory_namer' => NULL,
                    'delete_on_remove' => true,
                    'delete_on_update' => true,
                    'inject_on_load' => true,
                ),
                'avatar_source_image' => array(
                    'uri_prefix' => 'http://stagingpowerline.s3-website-us-east-1.amazonaws.com/avatars/src',
                    'upload_destination' => 'avatar_source_image_fs',
                    'namer' => 'vich_uploader.namer_uniqid',
                    'directory_namer' => NULL,
                    'delete_on_remove' => true,
                    'delete_on_update' => true,
                    'inject_on_load' => true,
                ),
                'avatar_representative' => array(
                    'uri_prefix' => 'http://stagingpowerline.s3-website-us-east-1.amazonaws.com/avatars/representatives',
                    'upload_destination' => 'avatar_representative_fs',
                    'namer' => 'vich_uploader.namer_uniqid',
                    'directory_namer' => NULL,
                    'delete_on_remove' => true,
                    'delete_on_update' => true,
                    'inject_on_load' => true,
                ),
                'educational_image' => array(
                    'uri_prefix' => 'http://stagingpowerline.s3-website-us-east-1.amazonaws.com/educational',
                    'delete_on_update' => true,
                    'delete_on_remove' => true,
                    'upload_destination' => 'educational_image_fs',
                    'namer' => 'vich_uploader.namer_uniqid',
                    'directory_namer' => NULL,
                    'inject_on_load' => true,
                ),
                'post_image' => array(
                    'uri_prefix' => 'http://stagingpowerline.s3-website-us-east-1.amazonaws.com/posts',
                    'delete_on_update' => true,
                    'delete_on_remove' => true,
                    'upload_destination' => 'blog_post_fs',
                    'namer' => 'vich_uploader.namer_uniqid',
                    'directory_namer' => NULL,
                    'inject_on_load' => true,
                ),
            ),
            'vich_uploader.storage_service' => 'vich_uploader.storage.gaufrette',
            'vich_uploader.adapter.class' => 'Vich\\UploaderBundle\\Adapter\\ORM\\DoctrineORMAdapter',
            'rms_push_notifications.class' => 'RMS\\PushNotificationsBundle\\Service\\Notifications',
            'rms_push_notifications.android.class' => 'RMS\\PushNotificationsBundle\\Service\\OS\\AndroidNotification',
            'rms_push_notifications.ios.class' => 'RMS\\PushNotificationsBundle\\Service\\OS\\iOSNotification',
            'rms_push_notifications.ios.feedback.class' => 'RMS\\PushNotificationsBundle\\Service\\iOSFeedback',
            'rms_push_notifications.android.enabled' => false,
            'rms_push_notifications.ios.enabled' => false,
            'old_sound_rabbit_mq.connection.class' => 'PhpAmqpLib\\Connection\\AMQPConnection',
            'old_sound_rabbit_mq.producer.class' => 'OldSound\\RabbitMqBundle\\RabbitMq\\Producer',
            'old_sound_rabbit_mq.consumer.class' => 'OldSound\\RabbitMqBundle\\RabbitMq\\Consumer',
            'old_sound_rabbit_mq.anon_consumer.class' => 'OldSound\\RabbitMqBundle\\RabbitMq\\AnonConsumer',
            'old_sound_rabbit_mq.rpc_client.class' => 'OldSound\\RabbitMqBundle\\RabbitMq\\RpcClient',
            'old_sound_rabbit_mq.rpc_server.class' => 'OldSound\\RabbitMqBundle\\RabbitMq\\RpcServer',
            'old_sound_rabbit_mq.logged.channel.class' => 'OldSound\\RabbitMqBundle\\RabbitMq\\AMQPLoggedChannel',
            'old_sound_rabbit_mq.data_collector.class' => 'OldSound\\RabbitMqBundle\\DataCollector\\MessageDataCollector',
            'old_sound_rabbit_mq.fallback.class' => 'OldSound\\RabbitMqBundle\\RabbitMq\\Fallback',
            'ciceroapi_login' => 'ACTL3C',
            'ciceroapi_password' => 'First50L3C',
            'ciceroapi_class' => 'Civix\\CoreBundle\\Service\\CiceroCalls',
            'civix_balanced.api_key' => 'ak-test-223c13hVsxbcGMaqCXq3tleHvMCXeXRBR',
            'civix_balanced.marketplace_user_id' => 'TEST-MP7ByVfFJSMah8VMM0blIek6',
            'civix_balanced.user_class' => 'Civix\\CoreBundle\\Entity\\Customer\\Customer',
            'web_profiler.controller.profiler.class' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController',
            'web_profiler.controller.router.class' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\RouterController',
            'web_profiler.controller.exception.class' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ExceptionController',
            'web_profiler.debug_toolbar.class' => 'Symfony\\Bundle\\WebProfilerBundle\\EventListener\\WebDebugToolbarListener',
            'web_profiler.debug_toolbar.intercept_redirects' => false,
            'web_profiler.debug_toolbar.mode' => 2,
            'web_profiler.debug_toolbar.position' => 'bottom',
            'sensio_distribution.webconfigurator.class' => 'Sensio\\Bundle\\DistributionBundle\\Configurator\\Configurator',
            'nelmio_api_doc.motd.template' => 'NelmioApiDocBundle::Components/motd.html.twig',
            'nelmio_api_doc.api_name' => 'Civix API documentation',
            'nelmio_api_doc.sandbox.enabled' => true,
            'nelmio_api_doc.sandbox.endpoint' => NULL,
            'nelmio_api_doc.sandbox.request_format.method' => 'format_param',
            'nelmio_api_doc.sandbox.accept_type' => '',
            'nelmio_api_doc.sandbox.body_format' => 'form',
            'nelmio_api_doc.sandbox.request_format.default_format' => 'json',
            'nelmio_api_doc.parser.form_type_parser.class' => 'Nelmio\\ApiDocBundle\\Parser\\FormTypeParser',
            'nelmio_api_doc.formatter.abstract_formatter.class' => 'Nelmio\\ApiDocBundle\\Formatter\\AbstractFormatter',
            'nelmio_api_doc.formatter.markdown_formatter.class' => 'Nelmio\\ApiDocBundle\\Formatter\\MarkdownFormatter',
            'nelmio_api_doc.formatter.simple_formatter.class' => 'Nelmio\\ApiDocBundle\\Formatter\\SimpleFormatter',
            'nelmio_api_doc.formatter.html_formatter.class' => 'Nelmio\\ApiDocBundle\\Formatter\\HtmlFormatter',
            'nelmio_api_doc.sandbox.authentication' => NULL,
            'nelmio_api_doc.extractor.api_doc_extractor.class' => 'Nelmio\\ApiDocBundle\\Extractor\\ApiDocExtractor',
            'nelmio_api_doc.form.extension.description_form_type_extension.class' => 'Nelmio\\ApiDocBundle\\Form\\Extension\\DescriptionFormTypeExtension',
            'nelmio_api_doc.twig.extension.extra_markdown.class' => 'Nelmio\\ApiDocBundle\\Twig\\Extension\\MarkdownExtension',
            'nelmio_api_doc.doc_comment_extractor.class' => 'Nelmio\\ApiDocBundle\\Util\\DocCommentExtractor',
            'nelmio_api_doc.extractor.handler.fos_rest.class' => 'Nelmio\\ApiDocBundle\\Extractor\\Handler\\FosRestHandler',
            'nelmio_api_doc.extractor.handler.jms_security.class' => 'Nelmio\\ApiDocBundle\\Extractor\\Handler\\JmsSecurityExtraHandler',
            'nelmio_api_doc.extractor.handler.sensio_framework_extra.class' => 'Nelmio\\ApiDocBundle\\Extractor\\Handler\\SensioFrameworkExtraHandler',
            'nelmio_api_doc.request_listener.parameter' => '_doc',
            'nelmio_api_doc.event_listener.request.class' => 'Nelmio\\ApiDocBundle\\EventListener\\RequestListener',
            'data_collector.templates' => array(
                'data_collector.config' => array(
                    0 => 'config',
                    1 => '@WebProfiler/Collector/config.html.twig',
                ),
                'data_collector.request' => array(
                    0 => 'request',
                    1 => '@WebProfiler/Collector/request.html.twig',
                ),
                'data_collector.exception' => array(
                    0 => 'exception',
                    1 => '@WebProfiler/Collector/exception.html.twig',
                ),
                'data_collector.events' => array(
                    0 => 'events',
                    1 => '@WebProfiler/Collector/events.html.twig',
                ),
                'data_collector.logger' => array(
                    0 => 'logger',
                    1 => '@WebProfiler/Collector/logger.html.twig',
                ),
                'data_collector.time' => array(
                    0 => 'time',
                    1 => '@WebProfiler/Collector/time.html.twig',
                ),
                'data_collector.memory' => array(
                    0 => 'memory',
                    1 => '@WebProfiler/Collector/memory.html.twig',
                ),
                'data_collector.router' => array(
                    0 => 'router',
                    1 => '@WebProfiler/Collector/router.html.twig',
                ),
                'data_collector.security' => array(
                    0 => 'security',
                    1 => 'SecurityBundle:Collector:security',
                ),
                'swiftmailer.data_collector' => array(
                    0 => 'swiftmailer',
                    1 => '@Swiftmailer/Collector/swiftmailer.html.twig',
                ),
                'data_collector.doctrine' => array(
                    0 => 'db',
                    1 => 'DoctrineBundle:Collector:db',
                ),
            ),
            'nelmio_api_doc.parser.jms_metadata_parser.class' => 'Nelmio\\ApiDocBundle\\Parser\\JmsMetadataParser',
        );
    }
}
