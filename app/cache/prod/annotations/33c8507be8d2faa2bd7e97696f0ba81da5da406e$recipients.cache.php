<?php return unserialize('a:6:{i:0;O:32:"JMS\\Serializer\\Annotation\\Expose":0:{}i:1;O:32:"JMS\\Serializer\\Annotation\\Groups":1:{s:6:"groups";a:1:{i:0;s:8:"api-poll";}}i:2;O:34:"JMS\\Serializer\\Annotation\\Accessor":2:{s:6:"getter";s:20:"getRecipientQuestion";s:6:"setter";N;}i:3;O:30:"JMS\\Serializer\\Annotation\\Type":1:{s:4:"name";s:6:"string";}i:4;O:31:"Doctrine\\ORM\\Mapping\\ManyToMany":7:{s:12:"targetEntity";s:38:"Civix\\CoreBundle\\Entity\\Representative";s:8:"mappedBy";N;s:10:"inversedBy";N;s:7:"cascade";a:1:{i:0;s:6:"remove";}s:5:"fetch";s:4:"LAZY";s:13:"orphanRemoval";b:0;s:7:"indexBy";N;}i:5;O:30:"Doctrine\\ORM\\Mapping\\JoinTable":4:{s:4:"name";s:20:"questions_recipients";s:6:"schema";N;s:11:"joinColumns";a:1:{i:0;O:31:"Doctrine\\ORM\\Mapping\\JoinColumn":7:{s:4:"name";s:11:"question_id";s:20:"referencedColumnName";s:2:"id";s:6:"unique";b:0;s:8:"nullable";b:1;s:8:"onDelete";s:7:"CASCADE";s:16:"columnDefinition";N;s:9:"fieldName";N;}}s:18:"inverseJoinColumns";a:1:{i:0;O:31:"Doctrine\\ORM\\Mapping\\JoinColumn":7:{s:4:"name";s:17:"representative_id";s:20:"referencedColumnName";s:2:"id";s:6:"unique";b:0;s:8:"nullable";b:1;s:8:"onDelete";s:7:"CASCADE";s:16:"columnDefinition";N;s:9:"fieldName";N;}}}}');