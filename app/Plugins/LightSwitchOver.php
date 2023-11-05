<?php

namespace App\Plugins;

use Filament\Panel;
use Illuminate\Contracts\View\View;

class LightSwitchOver extends \Awcodes\LightSwitch\LightSwitchPlugin
{

    protected ?string $tailPosition = null;
    public function register(Panel $panel): void
    {
        $panel->renderHook(
            name: 'panels::global-search.after',
            hook: fn (): View => view('components.LightSwitch.switcher_custom')
        );
    }
    public function tailPosition($tailPosition): static
    {
        $this->tailPosition = $tailPosition;

        return $this;
    }
    public function getTailPosition(): string
    {
        return $this->tailPosition ?? 'fixed';
    }
}
