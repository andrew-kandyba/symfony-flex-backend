<?php
declare(strict_types = 1);
/**
 * /src/Rest/Traits/Actions/Authenticated/PatchAction.php
 *
 * @author TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */

namespace App\Rest\Traits\Actions\Authenticated;

use App\DTO\RestDtoInterface;
use App\Rest\Traits\Methods\PatchMethod;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;

/**
 * Trait PatchAction
 *
 * Trait to add 'patchAction' for REST controllers for authenticated users.
 *
 * @see \App\Rest\Traits\Methods\PatchMethod for detailed documents.
 *
 * @package App\Rest\Traits\Actions\Root
 * @author TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
trait PatchAction
{
    use PatchMethod;

    /**
     * @Route(
     *      "/{id}",
     *      requirements={
     *          "id" = "%app.uuid_v1_regex%",
     *      },
     *      methods={"PATCH"},
     *  )
     *
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     *
     * @throws Throwable
     */
    public function patchAction(Request $request, RestDtoInterface $restDto, string $id): Response
    {
        return $this->patchMethod($request, $restDto, $id);
    }
}
