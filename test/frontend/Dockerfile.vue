FROM node:14

# Установка зависимостей
WORKDIR /app
COPY package.json .
RUN npm install

# Копирование исходного кода
COPY . .

# Сборка приложения
RUN npm run build

# Установка сервера Nginx
FROM nginx:latest
COPY ./nginx.conf /etc/nginx/nginx.conf

# Копирование собранного приложения в Nginx
COPY --from=0 /app/dist /usr/share/nginx/html

# Открытие порта
EXPOSE 8080

# Запуск сервера Nginx
CMD ["nginx", "-g", "daemon off;"]
