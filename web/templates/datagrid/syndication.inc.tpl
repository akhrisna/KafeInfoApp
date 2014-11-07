<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/">
	<channel>
		<title>Kafeinfo Bookmarking Sosial</title>
		<description>Kafeinfo Bookmarking Sosial News.</description>
		<link>http://www.kafeinfo.com</link>
		{section name="mysec" loop=$news}
			<item>
				<title><![CDATA[{$news[mysec].title}]]></title>
				<description><![CDATA[{$news[mysec].description} <a href='{$link}{$news[mysec].id}'>View</a>]]></description>
				<link>{$link}{$news[mysec].id}</link>
				<guid>{$link}{$news[mysec].id}</guid>
			</item>
		{/section}
	</channel>
</rss>