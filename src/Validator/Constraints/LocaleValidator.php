<?php
declare(strict_types = 1);
/**
 * /src/Validator/Constraints/LocaleValidator.php
 *
 * @author TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */

namespace App\Validator\Constraints;

use App\Service\Localization;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use function in_array;
use function is_string;

/**
 * Class LocaleValidator
 *
 * @package App\Validator\Constraints
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class LocaleValidator extends ConstraintValidator
{
    private Localization $localization;

    /**
     * LocaleValidator constructor.
     *
     * @param Localization $localization
     */
    public function __construct(Localization $localization)
    {
        $this->localization = $localization;
    }

    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint): void
    {
        if (in_array($value, $this->localization->getLocales(), true) !== true) {
            if (!is_string($value)) {
                $value = $value->getLocale();
            }

            $this->context
                ->buildViolation(Locale::MESSAGE)
                ->setParameter('{{ locale }}', $value)
                ->setCode(Locale::INVALID_LOCALE)
                ->addViolation();
        }
    }
}
