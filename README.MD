# Symfazon

[![Symfony Version](https://img.shields.io/badge/Symfony-%5E6.0-green)](https://symfony.com/)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

## Description

Symfazon is a shoe and clothing sales website programmed with Symfony.

## Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Contributing](#contributing)
- [License](#license)

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/Mydao57/Symfazon.git
    ```

2. **Install dependencies:**

    ```bash
    composer install
    ```
3. **Install node dependencies:**

    ```bash
    npm install
    ```

4. **Configure the environment:**

    ```bash
    cp .env.example .env
    ```

   Update the `.env` file with your configuration details.

5. **Run migrations:**

    ```bash
    php bin/console doctrine:migrations:migrate
    ```

6. **Load fixtures:**

    ```bash
    php bin/console doctrine:fixtures:load
    ```

7. **Run encore-webpack:**

    ```bash
    node run watch
    ```
   
8. **Start the Symfony development server:**

    ```bash
    symfony serve -d
    ```
   You can also put the symfony folder in the htdocs of XAMPP

Your Symfony project should now be up and running. Visit [http://localhost:8000/home](http://localhost:8000) in your browser.

## Configuration

The fixtures can be edited in the 'DataFixtures' fixtures folder.

## Contributing

If you'd like to contribute to this project, please follow the [Contributing Guidelines](CONTRIBUTING.md).

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.


# The project is still WIP
