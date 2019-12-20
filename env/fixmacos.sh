#!/bin/bash
# Fix Mac OS Checksum issue --> Fix in next release
# rebuild vagrant binary executable with corrected bug

if ! ruby -v | grep " 2."; then
	echo "bad ruby version"
else

	extBinPath=/usr/local/opt
	vagrantRepo=$extBinPath/vagrant
	vagrantBin=$vagrantRepo/exec/vagrant

	git clone https://github.com/hashicorp/vagrant.git $extBinPath

	cd $vagrantRepo

	sudo bundle install
	sudo bundle --binstubs exec

	$vagrantBin bin init -m hashicorp/bionic64

	# Symlink to system binaries index (vagrant CLi is now available)
	ln -sf $vagrantBin /usr/local/bin/vagrant
fi
# end
