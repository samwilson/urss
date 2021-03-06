<p align="center">
  <img height="100" src="https://github.com/codysnider/urss/raw/master/public/images/logo/normal-with-text.png">
</p>

**NOTE: This is not TT-RSS, but a fork to clean, secure and modernize it. The original author(s) are welcome
to integrate our code back into the original project. Everyone is welcome to contribute.**

Web-based news feed aggregator, designed to allow you to read news from
any location, while feeling as close to a real desktop application as possible.

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/codysnider/urss/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/codysnider/urss/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/codysnider/urss/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/codysnider/urss/?branch=master)

## Installation & Usage

Currently, Docker is the recommended approach. Please ensure Docker and the docker-compose commands are installed, up-to-date and available.

To start the application, browser to the root directory of this repository and run:
```bash
docker-compose up -d
```

To initialize the database, run:
```bash
./bin/migrate_db
```

## A Special Thanks To

[TextCaptcha](http://textcaptcha.com/) - Used as a secure, privacy-sensitive captcha solution
