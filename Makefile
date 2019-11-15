THEME_NAME=nidavellir

build:
	@echo "Building theme..."
	@mkdir -p ${THEME_NAME}
	@cp *.php style.css screenshot.png LICENSE readme.txt ${THEME_NAME}
	@cp -R inc/ ${THEME_NAME}
	@cp -R js/ ${THEME_NAME}
	@cp -R template-parts/ ${THEME_NAME}
	@zip -r nidavellir.zip nidavellir
	@rm -rf ${THEME_NAME}

clean:
	@rm -rf ${THEME_NAME}
	@rm ${THEME_NAME}.zip
