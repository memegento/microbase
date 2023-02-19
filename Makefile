# Some files are not ignored by magento-deploy-ignore so we fix it manually
# Framework di.xml has dependencies on modules, so we need to remove incompatible fixtures
cleanbase:
	rm -rf ./auth.json.sample
	rm -rf ./grunt-config.json.sample
	rm -rf ./nginx.conf.sample
	rm -rf ./package.json.sample
	rm -rf ./pub
	rm -rf ./lib
	rm -rf ./dev
	rm -rf ./app/design
	rm -rf ./setup && cp -r ./vendor/magento/magento2-base/setup/ ./setup
	rm -rf ./setup/src/Magento/Setup/Model/FixtureGenerator/CustomerGenerator.php
	rm -rf ./setup/performance-toolkit/
	rm -rf ./setup/view/
	rm -rf ./setup/pub/
	rm -rf ./setup/src/Magento/Setup/Test
	rm -rf ./setup/src/Magento/Setup/Model/FixtureGenerator/CustomerTemplateGenerator.php
	rm -rf ./setup/src/Magento/Setup/Model/FixtureGenerator/CustomerTemplateGenerator.php
	rm -rf ./setup/src/Magento/Setup/Model/FixtureGenerator/ProductGenerator.php
	rm -rf ./setup/src/Magento/Setup/Model/FixtureGenerator/BundleProductGenerator.php
	rm -rf ./setup/src/Magento/Setup/Model/FixtureGenerator/BundleProductTemplateGenerator.php
	rm -rf ./setup/src/Magento/Setup/Model/FixtureGenerator/ConfigurableProductGenerator.php
	rm -rf ./setup/src/Magento/Setup/Model/FixtureGenerator/ConfigurableProductTemplateGenerator.php
	rm -rf ./setup/src/Magento/Setup/Model/FixtureGenerator/SimpleProductTemplateGenerator.php
	rm -rf ./setup/src/Magento/Setup/Model/FixtureGenerator/ProductTemplateGeneratorFactory.php
	rm -rf ./setup/src/Magento/Setup/Model/Customer/
	rm -rf ./setup/src/Magento/Setup/Fixtures/CustomerGroupsFixture.php
	rm -rf ./setup/src/Magento/Setup/Fixtures/CustomersFixture.php
	rm -rf ./setup/src/Magento/Setup/Fixtures/StoresFixture.php
	rm -rf ./setup/src/Magento/Setup/Fixtures/AdminUsersFixture.php
	rm -rf ./setup/src/Magento/Setup/Fixtures/CategoriesFixture.php
	rm -rf ./setup/src/Magento/Setup/Fixtures/CategoryResolver.php
	rm -rf ./setup/src/Magento/Setup/Fixtures/AttributeSet/AttributeSetFixture.php
	rm -rf ./setup/src/Magento/Setup/Fixtures/ProductsAmountProvider.php
	rm -rf ./setup/src/Magento/Setup/Fixtures/ConfigurableProductsFixture.php
	rm -rf ./setup/src/Magento/Setup/Fixtures/BundleProductsFixture.php
	rm -rf ./setup/src/Magento/Setup/Fixtures/SimpleProductsFixture.php
	rm -rf ./setup/src/Magento/Setup/Fixtures/OrdersFixture.php
	rm -rf ./setup/src/Magento/Setup/Fixtures/EavVariationsFixture.php
	rm -rf ./setup/src/Magento/Setup/Fixtures/Quote/QuoteGenerator.php
	rm -rf ./setup/src/Magento/Setup/Fixtures/TaxRulesFixture.php
	rm -rf ./setup/src/Magento/Setup/Fixtures/CouponCodesFixture.php
	rm -rf ./setup/src/Magento/Setup/Fixtures/CartPriceRulesFixture.php
	mkdir -p ./pub/media
	mkdir -p ./pub/static

install:
	bin/magento setup:install -v \
	--base-url="https://memegento.local" \
	--db-host="mariadb" \
	--db-name="base_di_test" \
	--db-user="root" \
	--db-password="root" \
	--admin-firstname="memegento" \
	--admin-lastname="memegento" \
	--admin-email="memegento@memegento.local" \
	--admin-user="memegento" \
	--admin-password="Qwerty123!" \
	--page-cache-id-prefix="meme_" \
	--cache-id-prefix="meme_" \
	--cleanup-database \
	--no-interaction