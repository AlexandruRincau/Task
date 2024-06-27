server {
    listen 81;
    listen [::]:81;

    server_name taskweb.com;

    root /var/www/taskweb.com;
    index index.php index.html;

    location / {
        try_files $uri $uri/ =404;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;

        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;

        # Configurare pentru caching
        fastcgi_cache php_cache;
        fastcgi_cache_key "$scheme$request_method$host$request_uri";
        fastcgi_cache_valid 200 1m;
        fastcgi_cache_valid 301 302 10m;
        fastcgi_cache_valid 404 5m;

         #fastcgi_cache off;
        add_header X-Cache-Status $upstream_cache_status;
    }
}

