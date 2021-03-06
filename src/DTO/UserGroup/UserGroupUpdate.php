<?php
declare(strict_types = 1);
/**
 * /src/Rest/DTO/UserGroup/UserGroupUpdate.php
 *
 * @author TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */

namespace App\DTO\UserGroup;

use App\Entity\Role;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UserGroupUpdate
 *
 * @package App\DTO\UserGroup
 * @author TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class UserGroupUpdate extends UserGroup
{
    /**
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    protected ?Role $role = null;
}
