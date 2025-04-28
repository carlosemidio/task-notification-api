## Running the Project with Docker

To run this project using Docker, follow these steps:

1. **Install Docker and Docker Compose**: Ensure both Docker and Docker Compose are installed on your system. You can download them from [Docker's official website](https://www.docker.com/).

2. **Clone the Repository**:
    ```bash
    git clone git@github.com:carlosemidio/task-notifications-api.git
    cd task-notifications-api-main
    ```

3. **Set Up Environment Variables**:
    - Copy the `.env.example` file to `.env`:
      ```bash
      cp .env.example .env
      ```
    - Update the `.env` file with your configuration. Ensure the following variables are set:
      - `SYS_USER`: Specify the system user.
      - `SYS_UID`: Specify the user ID.
      - `DB_CONNECTION`: Set to `mysql`.
      - `DB_HOST`: Set to `db-task-notifications`.
      - `DB_PORT`: Set to `3306`.
      - `DB_DATABASE`: Set to `database name of preference`.
      - `DB_USERNAME`: Replace with your database username (e.g., `root` or `admin`).
      - `DB_PASSWORD`: Replace with your database password.

4. **Build and Start Docker Containers**:
    - Run the following command to build and start the containers, generate the application key, run migrations, seed the database, install project´s dependencies with composer and create a symbolic link for storage
      ```bash
      sh install.sh
      ```

5. **Run Migrations**:
    - Once the containers are running, execute the migrations to set up the database:
      ```bash
      docker-compose exec app php artisan migrate
      ```

6. **Access the Application**:
    - Open your browser and navigate to `http://localhost` to access the application.

7. **Stop the Containers**:
    - To stop the running containers, use:
      ```bash
      docker-compose down
      ```

You are now ready to use the project with Docker!
