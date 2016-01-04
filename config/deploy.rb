# config valid only for current version of Capistrano
lock '3.4.0'

set :application, 'andrewheins'
set :repo_url, 'git@github.com:andrewheins/andrewheins.ca.git'

# Default branch is :master
ask :branch, `git rev-parse --abbrev-ref HEAD`.chomp

# Default deploy_to directory is /var/www/my_app_name
set :deploy_to, '/var/www/html/'

# Default value for :scm is :git
set :scm, :git

# Default value for :format is :pretty
set :format, :pretty

# Default value for :log_level is :debug
set :log_level, :debug

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
set :linked_files, fetch(:linked_files, []).push('.htaccess', 'wp-config.php', 'wp-content/advanced-cache.php', 'wp-content/object-cache.php', 'wp-content/db.php')

# Default value for linked_dirs is []
set :linked_dirs, fetch(:linked_dirs, []).push('wp-content/uploads', 'wp-content/cache', 'wp-content/w3tc-config')

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

# Default value for keep_releases is 5
# set :keep_releases, 5

# namespace :deploy do

  desc "Setup Caching Permissions"
  task :deploy do
    on roles(:all), in: :sequence, wait: 5 do
      # Here we can do anything such as:
      within shared_path do
	execute :chmod, "777 wp-content/w3tc-config"
	execute :chmod, "755 wp-content"
      end
    end
  end

# end
