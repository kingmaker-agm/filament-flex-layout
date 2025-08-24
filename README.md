> [!CAUTION]
> For Filament v4+, use the native `Flex` layout component.


# Filament Flex Layout

[![Version](https://img.shields.io/badge/Version-1.0-brightgreen)](https://packagist.org/packages/kingmaker/filament-flex-layout)
![Packagist Downloads](https://img.shields.io/packagist/dm/kingmaker/filament-flex-layout)
[![Filament 3.3+](https://img.shields.io/badge/Filament-v3.3%2B-fdae4b)](https://filamentphp.com/)
![Tests](https://img.shields.io/badge/Tests-manual%20passing-green)
[![License](https://img.shields.io/badge/License-MIT-blue)](https://opensource.org/licenses/MIT)

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

#### Theming
> [!NOTE]
> You need to use _custom theme_ for the `Flex` component to work properly. 

Add the plugin's views to your tailwind.config.js file.
```javascript
export default{
  content: [
    '<path-to-vendor>/kingmaker/filament-flex-layout/resources/views/**/*.blade.php'
  ]
}
```

Then, add few classes (`gap-*`) to your tailwind config file's `safelist`.

```javascript
export default{
  content: [
    '<path-to-vendor>/kingmaker/filament-flex-layout/resources/views/**/*.blade.php'
  ],
  safelist: [
    { pattern: /gap-/ },
  ]
}
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

## API Reference

The `Flex` component is available for the **forms** and **infolists**
- `Kingmaker\FilamentFlexLayout\Forms\Flex` for forms layout.
- `Kingmaker\FilamentFlexLayout\Infolists\Flex` for infolists layout.

The `Flex` component extends the `Split` component and provides the following additional methods:
1. `gap(int|string|Closure $value)` - Set the gap between the children. The value can be a number or a Tailwind CSS spacing utility class.
2. `horizontalArrangement(HorizontalArrangement|string|Closure $value)` - Set the horizontal arrangement of the children. 
    - The value can be one of the `HorizontalArrangement` enum values.
    - The value can be one of strings: `start`, `center`, `end`, `evenly`, `between`, `around`, `stretch`.
    - The value can be a closure that returns one of the above values.

#### Utility Methods
1. `horizontallyArrangeStart(Closure|bool $condition = true)` - Set the horizontal arrangement to `start` if the condition is true.
2. `horizontallyArrangeCenter(Closure|bool $condition = true)` - Set the horizontal arrangement to `center` if the condition is true.
3. `horizontallyArrangeEnd(Closure|bool $condition = true)` - Set the horizontal arrangement to `end` if the condition is true.
4. `horizontallyArrangeSpaceEvenly(Closure|bool $condition = true)` - Set the horizontal arrangement to `evenly` if the condition is true.
5. `horizontallyArrangeSpaceBetween(Closure|bool $condition = true)` - Set the horizontal arrangement to `between` if the condition is true.
6. `horizontallyArrangeSpaceAround(Closure|bool $condition = true)` - Set the horizontal arrangement to `around` if the condition is true.
7. `horizontallyArrangeStretch(Closure|bool $condition = true)` - Set the horizontal arrangement to `stretch` if the condition is true.
8. `horizontallyArrangeBaseline(Closure|bool $condition = true)` - Set the horizontal arrangement to `baseline` if the condition is true.

## Contributing

Contributions are always welcome!


## License

This Package was being published under [MIT](https://choosealicense.com/licenses/mit/) License.

