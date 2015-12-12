=== Plugin Name ===
Contributors: stseprounof
Donate link: //http://www.stseprounof.org/
Tags: e-commerce, yandex market
Requires at least: 3.0.1
Tested up to: 4.0
Stable tag: 1.0

Plugin dumps all content of e-shop based on woocommerce to Yandex Markup Language (YML), subset of XML

== Description ==

YML (Yandex Markup Language) is ridigly formalized by Yandex XML subset. It’s utilized to dump online shop content (categories and products) and load it to Yandex Market and some other partner program. Dump to YML is made by Wordpress plugin BG_YML_DUMP.

During dump process:
- header is created with online shop name, company name, web-design agency name, web-designer email address, which are taken from plugin settings;
- currency section is created. The main currency will be taken from Woocommerce settings and it’s rate is 1. If online shop works for different countries, those countries currencies will be included to this section and rates will be according Central (National) bank of the country, issues main currency;
- cathegory section is created. If a category is a child one, the parent category will be included;
- all products is dumped.

Dump is made as scheduled task one a day. File is created on server under WordPress folder tree and has URL http://site URL/wp-content/uploads/yml/file_name.xml, where file_name is siteURL with dots, replaced by an underscore. For example, the dump file URL for site www.example.com will be http://www.example.com/wp-content/uploads/yml/www_example_com.xml.

If someone needs to get online shop content dump in real time (immediatelly), shortcode [bg-wc-uml-dump] can be placed on any site page. The dump will be made any time those page is rendered in browser.

== Installation ==

You have to prepare following information:
1. On-line shop short name
2. Owner on-line shop company name.
3. WEB-design agency or WEB-master name.
4. WEB-designer email address.
5. Products vendor name.

Upload the /bg_ymp_dump folder to your /wp-content/plugins/ directory.
Activate the plugin through the Plugins menu in WordPress® (on-line shop site in case of Wordpress Multisite).
Navigate to the «Settiong»->»ProductYML Dump» Options panel for configuration details. You have to fill all fields by prepared information and click buttom «Save Changes».

And You will get your on-line shop content dump every night.

== Changelog ==
v 2.0.1 from 15 jun 2015
- added filter to dump non standard product information;
- fixed bag with displaing categories;
- translated placeholder in category selector.


v 2.0 from 31 may 2015
- changed version numeration;
- added possibility to dump hierarchical category in <typePrefix> tag;
- added checkbox to plugin options page to turn on/off dump hierarchical category;
- added max. number images URL per product dump;
- added number input files to plugin options page to enter max. number images URL;
- added category restrictions (include/exclude) to YML product dump;
- added checkbox to plugin options page to turn on/off category restrictions;
- added js script to control category restrictions options visibility depending on checkbox;
- added include/exclude categories radio button to plugin options page;
- added product category input field as it made in woocommerce plugin;
- completely rebuild pot file;
- completely rebuild messages translation to Russian;
- plugin module splited to two files, and admin file is only loaded in case of admin dashboard;
- plugin options page splited to two tabs

v 150318 18 mar 2015
- Russian currency in Woocommerce is RUB, not RUR

v 150314 14 mar 2015
- bugfix with product cache in main loop

v 150210 10 feb 2015
- bugfix with prices for pruduct on sale

v 141104 4 nov 2014

- additional check if woocommerce installed and active
