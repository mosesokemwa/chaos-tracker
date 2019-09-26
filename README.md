# Chaos Tracker Without The Monkey :)

#### Project set up
Create the env files
```bash
touch .env
touch resources/interface/.env
```

Add environment variables to file
NOTE: change the `DATABASE_URL` placeholders
```bash
echo "DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name" >> .env
echo "APP_ENV=dev" >> .env
echo "APP_SECRET=edd14214b9e82dd8a22615ef8fe668e2" >> .env
echo "CORS_ALLOW_ORIGIN=^.*$" >> .env
echo "REACT_APP_API_URL='http://127.0.0.1:8000'" >> resources/interface/.env
```

#### Running the back-end service
```bash
composer install
symfony server:start
```

#### Running the front-end consumer
```bash
cd resources/interface
npm install
npm start
```