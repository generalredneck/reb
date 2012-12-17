<?php

namespace Application\Entity;

use ZfcUserDoctrineORM\Entity\User as ZfcUserDoctrineORMUserEntity;
use ZfcRbac\Identity\IdentityInterface;

class User extends ZfcUserDoctrineORMUserEntity implements IdentityInterface
{

}
