## About

CodeSniffer helps to check coding convention..

## Requirements

- PHP ^7.1.3
- Composer *

## Installation

Install `d1s1g4codelovers/codesniffer` package via composer.

```bash
composer require "d1s1g4codelovers/codesniffer" --dev
```

Load standards whenever `post-autoload-dump` event is triggered.

```json
{
    "scripts": {
        "post-autoload-dump": [
            "D1S1G4CodeLovers\\CodeSniffer\\ComposerScripts::postAutoloadDump"
        ]
    }
}
```

Check what standards are available after installing.

```bash
vendor/bin/phpcs -i
# You may see an additional standard: SunAsterisk.
```

## Usage

Check PHP coding convention of the given code directory.

```bash
vendor/bin/phpcs /path/to/code --standard=SunAsterisk
```

## Contributing

- Thank you for considering contributing to `d1s1g4codelovers/codesniffer` package!

- Feel free to submit an issue or a pull request for your expectation!

- All contributions are welcome and accepted via pull requests.

## License

- The `d1s1g4codelovers/codesniffer` package is open-sourced software licensed under the [MIT license](LICENSE.md).
