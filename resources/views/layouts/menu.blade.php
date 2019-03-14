<li class="{{ Request::is('inboundPackages*') ? 'active' : '' }}">
    <a href="{!! route('inboundPackages.index') !!}"><i class="fa fa-edit"></i><span>Inbound Packages</span></a>
</li>

<li class="{{ Request::is('inboundPackageLogs*') ? 'active' : '' }}">
    <a href="{!! route('inboundPackageLogs.index') !!}"><i class="fa fa-edit"></i><span>Inbound Package Logs</span></a>
</li>

<li class="{{ Request::is('websiteCategories*') ? 'active' : '' }}">
    <a href="{!! route('websiteCategories.index') !!}"><i class="fa fa-edit"></i><span>Website Categories</span></a>
</li>


<li class="{{ Request::is('websites*') ? 'active' : '' }}">
    <a href="{!! route('websites.index') !!}"><i class="fa fa-edit"></i><span>Websites</span></a>
</li>

<li class="{{ Request::is('languageCategories*') ? 'active' : '' }}">
    <a href="{!! route('languageCategories.index') !!}"><i class="fa fa-edit"></i><span>Language Categories</span></a>
</li>

<li class="{{ Request::is('developmentCaseStudies*') ? 'active' : '' }}">
    <a href="{!! route('developmentCaseStudies.index') !!}"><i class="fa fa-edit"></i><span>Development Case Studies</span></a>
</li>

<li class="{{ Request::is('newsFeeds*') ? 'active' : '' }}">
    <a href="{!! route('newsFeeds.index') !!}"><i class="fa fa-edit"></i><span>News Feeds</span></a>
</li>

<li class="{{ Request::is('lastRuns*') ? 'active' : '' }}">
    <a href="{!! route('lastRuns.index') !!}"><i class="fa fa-edit"></i><span>Last Runs</span></a>
</li>

<li class="{{ Request::is('servers*') ? 'active' : '' }}">
    <a href="{!! route('servers.index') !!}"><i class="fa fa-edit"></i><span>Servers</span></a>
</li>

<li class="{{ Request::is('fileBackupLocations*') ? 'active' : '' }}">
    <a href="{!! route('fileBackupLocations.index') !!}"><i class="fa fa-edit"></i><span>File Backup Locations</span></a>
</li>

<li class="{{ Request::is('downloadItems*') ? 'active' : '' }}">
    <a href="{!! route('downloadItems.index') !!}"><i class="fa fa-edit"></i><span>Download Items</span></a>
</li>

<li class="{{ Request::is('televisionShows*') ? 'active' : '' }}">
    <a href="{!! route('televisionShows.index') !!}"><i class="fa fa-edit"></i><span>Television Shows</span></a>
</li>

<li class="{{ Request::is('televisionShowEpisodes*') ? 'active' : '' }}">
    <a href="{!! route('televisionShowEpisodes.index') !!}"><i class="fa fa-edit"></i><span>Television Show Episodes</span></a>
</li>

