<?php return unserialize('a:7:{i:0;O:30:"Doctrine\\ORM\\Mapping\\ManyToOne":4:{s:12:"targetEntity";s:29:"Civix\\CoreBundle\\Entity\\State";s:7:"cascade";a:1:{i:0;s:7:"persist";}s:5:"fetch";s:4:"LAZY";s:10:"inversedBy";N;}i:1;O:31:"Doctrine\\ORM\\Mapping\\JoinColumn":7:{s:4:"name";s:5:"state";s:20:"referencedColumnName";s:4:"code";s:6:"unique";b:0;s:8:"nullable";b:1;s:8:"onDelete";s:8:"SET NULL";s:16:"columnDefinition";N;s:9:"fieldName";N;}i:2;O:48:"Symfony\\Component\\Validator\\Constraints\\NotBlank":2:{s:7:"message";s:31:"This value should not be blank.";s:6:"groups";a:1:{i:0;s:12:"registration";}}i:3;O:32:"JMS\\Serializer\\Annotation\\Expose":0:{}i:4;O:30:"JMS\\Serializer\\Annotation\\Type":1:{s:4:"name";s:6:"string";}i:5;O:34:"JMS\\Serializer\\Annotation\\Accessor":2:{s:6:"getter";s:12:"getStateCode";s:6:"setter";N;}i:6;O:32:"JMS\\Serializer\\Annotation\\Groups":1:{s:6:"groups";a:1:{i:0;s:8:"api-info";}}}');