# Script For Deleting cache Symfony (Ubuntu)

# @uthor Hikmahtiar <hikmahtiar.cool@gmail.com>
echo "Deleting Cache..."
sudo rm -rf var/logs/dev.log
sudo rm -rf var/logs/prod.log
sudo rm -rf var/cache/dev/
sudo rm -rf var/cache/prod/
echo "Cache Deleted."
