FROM node:18

WORKDIR /app 

# COPY ./front-react/package.json ./front-react/package-lock.json ./
COPY ./front-react .
RUN npm install
RUN npm run build

EXPOSE 3000

CMD [ "npm", "start" ]
