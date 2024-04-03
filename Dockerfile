FROM alpine:3.16

ARG BUILD_DATE=""
ARG VCS_REF=""
ARG VERSION=""

LABEL maintainer="https://github.com/localgod/console-color.git" \
      org.label-schema.schema-version="1.0" \
      org.label-schema.vendor="Localgod" \
      org.label-schema.name="localgod_build" \
      org.label-schema.license="MIT" \
      org.label-schema.description="PHP Consol color" \
      org.label-schema.vcs-url="https://github.com/localgod/console-color.git" \
      org.label-schema.vcs-ref=${VCS_REF} \
      org.label-schema.build-date=${BUILD_DATE} \
      org.label-schema.version=${VERSION} \
      org.label-schema.url="http://localgod.github.io/console-color/" \
      org.label-schema.usage="https://raw.githubusercontent.com/localgod/console-color/master/README.md"

ARG bash_version=5.1.16-r2
ARG php8_version=8.1.22-r0
ARG make_version=4.3-r0
ARG jq_version=1.6-r1
ARG git_version=2.36.6-r0
ARG imagemagick_version=7.1.0.50-r0
ARG composer_version=2.4.2-r0
ARG php81_pecl_xdebug=3.1.6-r0
ARG pcre_version=8.45-r2
ARG php_major_version=php81
ARG php_version=8.1.22-r0

RUN for value in phar iconv openssl curl mbstring tokenizer xmlwriter simplexml dom xml fileinfo; do apk --update --no-cache add ${php_major_version}-${value}=${php_version}; done

RUN apk --update --no-cache add \
    bash=${bash_version} \
    composer=${composer_version} \
    git=${git_version} \
    imagemagick=${imagemagick_version} \
    jq=${jq_version} \
    make=${make_version} \
    pcre=${pcre_version} \
    php81=${php8_version} \
    php81-pecl-xdebug=${php81_pecl_xdebug}

RUN ln -s -f /usr/bin/php8 /usr/bin/php && echo zend_extension=xdebug.so > /etc/php8/conf.d/50_xdebug.ini && \
    echo xdebug.mode=coverage >> /etc/php8/conf.d/50_xdebug.ini

