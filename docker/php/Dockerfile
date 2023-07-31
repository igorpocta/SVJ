FROM php:8.1.20-fpm AS app_base

ENV ACCEPT_EULA=Y
ARG TIMEZONE=Europe/Prague
ENV TIMEZONE=${TIMEZONE}

# Set timezone
RUN ln -sf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime && \
	echo ${TIMEZONE} > /etc/timezone && \
	dpkg-reconfigure -f noninteractive tzdata

# Install dependencies
RUN apt-get update && apt-get install -y \
    wget \
    curl \
    bash \
    zip \
    unzip \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    zlib1g-dev \
    libwebp-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    libzip-dev \
    libbz2-dev

# Clear cache
RUN apt-get clean -y && \
    apt-get autoclean -y && \
    apt-get autoremove -y && \
    rm -rf /var/lib/apt/lists/* /var/lib/log/* /tmp/* /var/tmp/*

# Install PHP extensions
RUN docker-php-ext-configure zip && \
    docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp && \
    docker-php-ext-install pdo_mysql mysqli soap xml bz2 zip mbstring bcmath gd intl opcache

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# PHP Customization
ADD ./docker/php/php.ini /usr/local/etc/php/conf.d/custom-php.ini
ADD ./docker/php/opcache.ini /usr/local/etc/php/conf.d/opcache.ini


# Set working directory and ownership
WORKDIR /var/www/html



# Development image
FROM app_base as app_development

ARG USER_ID
ARG GROUP_ID

# Create a non-root user
RUN groupadd -g ${GROUP_ID} appuser && \
    useradd -l -u ${USER_ID} -g appuser appuser && \
    install -d -m 0755 -o appuser -g appuser /home/appuser

# Set working directory and ownership
RUN chown -R appuser:appuser /var/www/html
USER appuser
