require 'yaml'

dir = File.dirname(File.expand_path(__FILE__))
symfonyParameters = YAML.load_file("#{dir}/src/Corvus/CoreBundle/Resources/config/corvusdb.yml")

Vagrant.configure("2") do |config|
    config.vm.box = "hashicorp/precise32"
    config.vm.box_url = "http://dl.dropbox.com/u/1537815/precise64.box"

    # Set the Hostname so people know this is the Dev enviroment
    config.vm.hostname = "CorvusDev"

    config.vm.post_up_message = "Welcome to Corvus Dev, everything should have been setup for you, open http://localhost:3000"

    # Sync the Corvus files to the Web Server
    if Vagrant::Util::Platform.windows?
        config.vm.synced_folder ".", "/vagrant", :mount_options => ["dmode=777","fmode=777"], :owner => "vagrant", :group => "vagrant"
    else
        config.vm.synced_folder "./", "/vagrant", :nfs => { :mount_options => ["dmode=775,fmode=664,rw"] }
    end

    # Setup the Network and Forwarding port to 3000
    # Open up http://localhost:3000 to view Corvus in Dev
    config.vm.network :private_network, ip: "192.168.10.10"
    config.vm.network "forwarded_port", host: 3000, guest: 80

    # Set the Timezone
    config.vm.provision :shell, :inline => "echo \"Europe/London\" | sudo tee /etc/timezone && dpkg-reconfigure --frontend noninteractive tzdata"

    config.vm.provider :virtualbox do |vb|
        vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
        vb.customize ["modifyvm", :id, "--memory", "1024"]
    end

    # Run the Setup script which will configure the dev environment
    config.vm.provision :shell, run: 'once' do |s|
        s.path = "#{dir}/bootstrap.sh"
        s.args = ["#{symfonyParameters['parameters']['corvus.database_name']}", "#{symfonyParameters['parameters']['corvus.database_password']}"]
    end
end