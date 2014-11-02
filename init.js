/**********************************************************
 * rutorrent Credentials: Basic security for rutorrent
 * Author: Carlos Jimenez Delgado (mail@carlosjdelgado.com)
 * License: GNU General Public License
 **********************************************************/
plugin.onLangLoaded = function()
{
	this.addSeparatorToToolbar();
	this.addButtonToToolbar("logoff", theUILang.loginOut, "location.href='plugins/rutorrentCredentials/logout.php'");
}

plugin.init = function () {
	plugin.loadCSS('css/login');
	plugin.loadLang();
}

credentials = plugin;
plugin.init();