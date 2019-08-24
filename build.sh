rm -rf dist
npm run build
mkdir dist
cp -r assets dist/assets
cp -r config dist/config
cp -r packages dist/packages
cp -r vendor dist/vendor
cp footer.php dist/footer.php
cp functions.php dist/functions.php
cp header.php dist/header.php
cp index.php dist/index.php
cp page.php dist/page.php
cp sidebar.php dist/sidebar.php
cp single.php dist/single.php
cp style.css dist/style.css
cp screenshot.png dist/screenshot.png
cp README.md dist/README.md
cp LICENSE dist/LICENSE
