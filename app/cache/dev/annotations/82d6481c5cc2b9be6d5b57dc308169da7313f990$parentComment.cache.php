<?php return unserialize('a:6:{i:0;O:30:"Doctrine\\ORM\\Mapping\\ManyToOne":4:{s:12:"targetEntity";s:11:"BaseComment";s:7:"cascade";N;s:5:"fetch";s:4:"LAZY";s:10:"inversedBy";s:16:"childrenComments";}i:1;O:31:"Doctrine\\ORM\\Mapping\\JoinColumn":7:{s:4:"name";s:3:"pid";s:20:"referencedColumnName";s:2:"id";s:6:"unique";b:0;s:8:"nullable";b:1;s:8:"onDelete";s:7:"CASCADE";s:16:"columnDefinition";N;s:9:"fieldName";N;}i:2;O:32:"JMS\\Serializer\\Annotation\\Expose":0:{}i:3;O:32:"JMS\\Serializer\\Annotation\\Groups":1:{s:6:"groups";a:2:{i:0;s:12:"api-comments";i:1;s:16:"api-comments-add";}}i:4;O:30:"JMS\\Serializer\\Annotation\\Type":1:{s:4:"name";s:7:"integer";}i:5;O:34:"JMS\\Serializer\\Annotation\\Accessor":2:{s:6:"getter";s:11:"getParentId";s:6:"setter";N;}}');