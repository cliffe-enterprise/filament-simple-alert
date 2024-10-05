<?php

namespace CodeWithDennis\SimpleAlert\Components\Forms;

use Closure;
use CodeWithDennis\SimpleAlert\Components\Concerns\HasColor;
use CodeWithDennis\SimpleAlert\Components\Concerns\HasDescription;
use CodeWithDennis\SimpleAlert\Components\Concerns\HasIcon;
use CodeWithDennis\SimpleAlert\Components\Concerns\HasLink;
use CodeWithDennis\SimpleAlert\Components\Concerns\HasSimple;
use CodeWithDennis\SimpleAlert\Components\Concerns\HasTitle;
use Filament\Forms\Components\Field;

class SimpleAlert extends Field
{
    use HasColor;
    use HasDescription;
    use HasIcon;
    use HasLink;
    use HasSimple;
    use HasTitle;

    protected Closure|string|null $actionsVerticalAlignment = null;

    protected string $view = 'filament-simple-alert::components.simple-alert-field';

    public function actions(array|Closure $actions): static
    {
        $this->actions = $actions;

        return $this;
    }

    public function actionsVerticalAlignment(Closure|string $actionsVerticalAlignment = 'center'): static
    {
        $this->actionsVerticalAlignment = $actionsVerticalAlignment;

        return $this;
    }

    public function getActionsVerticalAlignment(): ?string
    {
        return $this->evaluate($this->actionsVerticalAlignment);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->dehydrated(false)
            ->hiddenLabel();
    }
}
