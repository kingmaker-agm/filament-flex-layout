
# Filament Flex Layout

This package provides the **Flexbox** layout for the forms & infolists components in your Filament admin panel.


## Documentation

The `Split` layout Component in the _Forms_ and _Infolists_ of the Filament panel has been implemented using the **CSS Flexbox**, But unfortunatley it doesn't support important properties such as `justify-content` to manage the arrangement of its children.

The `Flex` layout Component solves this problem. The `Flex` is a sub-class of the `Split` component and provides additional APIs to align the **Horizontal Arrangement** (`justify-content`) and Flex **Gap** (`gap`).

> [!IMPORTANT]
> The Children of the `Flex` component must be chained with `->grow(false)` method for this to work.

#### Horizontal Arrangement

The Horizontal placement can be managed using `->horizontalArrangement()` method.
- `HorizontalArrangement::Start` - Justify content to the start of the container.
- `HorizontalArrangement::Center` - Justify content to the center of the container.
- `HorizontalArrangement::End` - Justify content to the end of the container.
- `HorizontalArrangement::Evenly` - Justify content with even spacing between them.
- `HorizontalArrangement::Between` - Justify content with space between them.
- `HorizontalArrangement::Around` - Justify content with space around them.

#### Flex Gap

The **Gap** between the children can be controlled using the `->gap()` method. The gap can be set to a specific value or a Tailwind CSS spacing utility class.

```php
Flex::make([])
    ->gap(4) // will be translated to `gap-4` tailwind class
```


## Requirements

This package expects `filament/filament` package to be over `v3.3`.
## Installation

The package can be installed via Composer.

```bash
composer require kingmaker/filament-flex-layout
```

## Usage

Within your **Forms** and **Infolists** schema definition, You can use the `Flex` layout Component provided by this package.

```php
use Kingmaker\FilamentFlexLayout\Enums\HorizontalArrangement;
use Kingmaker\FilamentFlexLayout\Forms\Flex;

Flex::make([
    Forms\Components\Toggle::make('user_like')
        ->grow(false) // <<-- Important
        ->onIcon('heroicon-s-heart')
        ->offIcon('heroicon-o-heart')
        ->onColor('danger')
        ->offColor('gray'),
    Forms\Components\Toggle::make('user_read')
        ->grow(false) // <<-- Important
        ->onIcon('heroicon-s-book-open')
        ->offIcon('heroicon-s-book-open')
        ->onColor('success')
        ->offColor('gray'),    
])
    ->horizontalArrangement(HorizontalArrangement::Evenly)
```

```php
use Kingmaker\FilamentFlexLayout\Enums\HorizontalArrangement;
use Kingmaker\FilamentFlexLayout\Infolists\Flex;

Flex::make([])
    ->horizontalArrangement(HorizontalArrangement::Evenly)
    ->gap(12)
```

## Contributing

Contributions are always welcome!


## License

This Package was being published under [MIT](https://choosealicense.com/licenses/mit/) License.

