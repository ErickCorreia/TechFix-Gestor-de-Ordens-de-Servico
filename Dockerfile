# Usa uma imagem oficial do PHP com servidor Apache
FROM php:8.2-apache

# Instala dependências do sistema para o Composer
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip

# Habilita o módulo de reescrita do Apache
RUN a2enmod rewrite

# Copia os arquivos do projeto para dentro do servidor
COPY . /var/www/html/

# Instala o Composer para gerenciar as dependências do seu projeto [2]
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --optimize-autoloader

# Ajusta as permissões para o SQLite funcionar corretamente
RUN chown -R www-data:www-data /var/www/html/

# Define a porta padrão que o Render utiliza
ENV PORT=80
EXPOSE 80
