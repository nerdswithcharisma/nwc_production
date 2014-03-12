(function() {
	tinymce.create('tinymce.plugins.mylink', {
		init : function(ed, url){
			//columns
			ed.addButton('columns',{
				title : 'Columns',
				image : url+'/tinymce_buttons/columns.png',
				onclick : function(){
					ed.selection.setContent('[columns columns="three" placement="first, last"]' + ed.selection.getContent() + '[/columns]');
					ed.undoManager.add();
				}
			});

			//buttons
			ed.addButton('buttons',{
				title : 'Buttons',
				image : url+'/tinymce_buttons/buttons.png',
				onclick : function(){
					ed.selection.setContent('[button color="white, black, blue, green, red, orange, purple, #733791" link=""]' + ed.selection.getContent() + '[/button]');
					ed.undoManager.add();
				}
			});

			//alerts
			ed.addButton('alerts',{
				title : 'Alerts',
				image : url+'/tinymce_buttons/alerts.png',
				onclick : function(){
					ed.selection.setContent('[alert type="help, info, error, success"]' + ed.selection.getContent() + '[/alert]');
					ed.undoManager.add();
				}
			});

			//accordion
			ed.addButton('accordion',{
				title : 'Accordion',
				image : url+'/tinymce_buttons/accordion.png',
				onclick : function(){
					ed.selection.setContent('[accordion class=""] Replace me by highlighting me and clicking the accordion panel button ' + ed.selection.getContent() + '[/accordion]');
					ed.undoManager.add();
				}
			});

			//accordion panel
			ed.addButton('accordion_panel',{
				title : 'Accordion Panel',
				image : url+'/tinymce_buttons/accordion_panel.png',
				onclick : function(){
					ed.selection.setContent('[panel name="Tab Title"] ' + ed.selection.getContent() + '[/panel]');
					ed.undoManager.add();
				}
			});

			//tabs
			ed.addButton('tabs',{
				title : 'Tabs',
				image : url+'/tinymce_buttons/tabs.png',
				onclick : function(){
					ed.selection.setContent('[tabgroup] Replace me by highlingint me and clicking the tab content button ' + ed.selection.getContent() + '[/tabgroup]');
					ed.undoManager.add();
				}
			});

			//tab content
			ed.addButton('tab_content',{
				title : 'Tab Content',
				image : url+'/tinymce_buttons/tab_content.png',
				onclick : function(){
					ed.selection.setContent('[tab title="A title"] ' + ed.selection.getContent() + '[/tab]');
					ed.undoManager.add();
				}
			});

			//social buttons
			ed.addButton('social_buttons',{
				title : 'Social Buttons',
				image : url+'/tinymce_buttons/social_buttons.png',
				onclick : function(){
					ed.selection.setContent('[social logo="dribbble, nwc, rss, facebook, twitter, wordpress, direction" link=""]');
					ed.undoManager.add();
				}
			});

			//google map
			ed.addButton('map',{
				title : 'Google Map',
				image : url+'/tinymce_buttons/map.png',
				onclick : function(){
					ed.selection.setContent('[map location="2077 Miner St. Des Plaines, 60016" width="150px" height="350px" frameborder="0" margin-height="" margin-width="" type="s, m, r, h, t" zoom="13"]');
					ed.undoManager.add();
				}
			});

			//tables
			ed.addButton('tables',{
				title : 'Tables',
				image : url+'/tinymce_buttons/tables.png',
				onclick : function(){
					ed.selection.setContent('[table type="table" cols="#, First Name, Last Name, Best Movie" data="1, Mark, Hammil, Empire, 2, Harrison, Ford, Empire, 3, Carrie, Fisher, Jedi" count="4"]');
					ed.undoManager.add();
				}
			});

			//rotator
			ed.addButton('rotator',{
				title : 'Rotator',
				image : url+'/tinymce_buttons/rotator.png',
				onclick : function(){
					ed.selection.setContent('[rotator delay="0" fx="fade" pause="1" random="0" speed="1000" timeout="4000" pager="false" next="" prev="" width="100%"]' + ed.selection.getContent() + '[/rotator]');
					ed.undoManager.add();
				}
			});

			//tooltip
			ed.addButton('tooltip',{
				title : 'Tooltip',
				image : url+'/tinymce_buttons/tooltip.png',
				onclick : function(){
					ed.selection.setContent('[tooltip tooltip="This is a tooltip"]' + ed.selection.getContent() + '[/tooltip]');
					ed.undoManager.add();
				}
			});
		},
		createControl : function(n, cm){
			return null;
		},
	});
	tinymce.PluginManager.add('columns', tinymce.plugins.mylink);
	tinymce.PluginManager.add('buttons', tinymce.plugins.mylink);
	tinymce.PluginManager.add('alerts', tinymce.plugins.mylink);
	tinymce.PluginManager.add('accordion', tinymce.plugins.mylink);
	tinymce.PluginManager.add('accordion_panel', tinymce.plugins.mylink);
	tinymce.PluginManager.add('tabs', tinymce.plugins.mylink);
	tinymce.PluginManager.add('tab_content', tinymce.plugins.mylink);
	tinymce.PluginManager.add('social', tinymce.plugins.mylink);
	tinymce.PluginManager.add('map', tinymce.plugins.mylink);
	tinymce.PluginManager.add('tables', tinymce.plugins.mylink);
	tinymce.PluginManager.add('rotator', tinymce.plugins.mylink);
})();