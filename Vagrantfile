# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = 'ubuntu1204-chef1144'
  config.vm.box_url = 'https://opscode-vm-bento.s3.amazonaws.com/vagrant/opscode_ubuntu-12.04_chef-11.4.4.box'
  config.vm.hostname = 'php-webserver'

  # Enable Synced Folders
  config.vm.synced_folder ".", "/vagrant"

  # Forward SSH Keys
  config.ssh.forward_agent = true

  # Berkshelf all the things
  [:up, :provision].each do |cmd|
    config.trigger.before cmd, :stdout => true do
      info 'Cleaning cookbook directory'
      run "rm -rf cookbooks"
      info 'Installing cookbook dependencies with berkshelf'
      run "berks vendor cookbooks"
    end
  end

  config.vm.provision :chef_solo do |chef|
    chef.add_recipe 'fantasy-data-api'

    chef.cookbooks_path = [ "cookbooks" ]

    chef.json = {}
    chef.log_level = :debug
  end
end
