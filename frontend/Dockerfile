FROM node:18
WORKDIR /app # definit le workdir dans le container
COPY package.json package-lock.json ./
RUN npm install
COPY . .
EXPOSE 3000
CMD [ "npm", "start" ]
