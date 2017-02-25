@extends('layouts.default')
@section('content')  
  <div class="mainwrapper">
    
    <div class="header">
        <div class="logo">
            <a href="dashboard.html"><img src="images/logo.png" alt="" /></a>
        </div>
        <div class="headerinner">
            <ul class="headmenu">
                <li class="odd">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="count">4</span>
                        <span class="head-icon head-message"></span>
                        <span class="headmenu-label">Messages</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-header">Messages</li>
                        <li><a href=""><span class="icon-envelope"></span> New message from <strong>Jack</strong> <small class="muted"> - 19 hours ago</small></a></li>
                        <li><a href=""><span class="icon-envelope"></span> New message from <strong>Daniel</strong> <small class="muted"> - 2 days ago</small></a></li>
                        <li><a href=""><span class="icon-envelope"></span> New message from <strong>Jane</strong> <small class="muted"> - 3 days ago</small></a></li>
                        <li><a href=""><span class="icon-envelope"></span> New message from <strong>Tanya</strong> <small class="muted"> - 1 week ago</small></a></li>
                        <li><a href=""><span class="icon-envelope"></span> New message from <strong>Lee</strong> <small class="muted"> - 1 week ago</small></a></li>
                        <li class="viewmore"><a href="messages.html">View More Messages</a></li>
                    </ul>
                </li>
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                    <span class="count">10</span>
                    <span class="head-icon head-users"></span>
                    <span class="headmenu-label">New Users</span>
                    </a>
                    <ul class="dropdown-menu newusers">
                        <li class="nav-header">New Users</li>
                        <li>
                            <a href="">
                                <img src="images/photos/thumb1.png" alt="" class="userthumb" />
                                <strong>Draniem Daamul</strong>
                                <small>April 20, 2013</small>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="images/photos/thumb2.png" alt="" class="userthumb" />
                                <strong>Shamcey Sindilmaca</strong>
                                <small>April 19, 2013</small>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="images/photos/thumb3.png" alt="" class="userthumb" />
                                <strong>Nusja Paul Nawancali</strong>
                                <small>April 19, 2013</small>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="images/photos/thumb4.png" alt="" class="userthumb" />
                                <strong>Rose Cerona</strong>
                                <small>April 18, 2013</small>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="images/photos/thumb5.png" alt="" class="userthumb" />
                                <strong>John Doe</strong>
                                <small>April 16, 2013</small>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="odd">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                    <span class="count">1</span>
                    <span class="head-icon head-bar"></span>
                    <span class="headmenu-label">Statistics</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-header">Statistics</li>
                        <li><a href=""><span class="icon-align-left"></span> New Reports from <strong>Products</strong> <small class="muted"> - 19 hours ago</small></a></li>
                        <li><a href=""><span class="icon-align-left"></span> New Statistics from <strong>Users</strong> <small class="muted"> - 2 days ago</small></a></li>
                        <li><a href=""><span class="icon-align-left"></span> New Statistics from <strong>Comments</strong> <small class="muted"> - 3 days ago</small></a></li>
                        <li><a href=""><span class="icon-align-left"></span> Most Popular in <strong>Products</strong> <small class="muted"> - 1 week ago</small></a></li>
                        <li><a href=""><span class="icon-align-left"></span> Most Viewed in <strong>Blog</strong> <small class="muted"> - 1 week ago</small></a></li>
                        <li class="viewmore"><a href="charts.html">View More Statistics</a></li>
                    </ul>
                </li>
                <li class="right">
                    <div class="userloggedinfo">
                        <img src="images/photos/thumb1.png" alt="" />
                        <div class="userinfo">
                            <h5>Juan Dela Cruz <small>- juan@themepixels.com</small></h5>
                            <ul>
                                <li><a href="editprofile.html">Edit Profile</a></li>
                                <li><a href="">Account Settings</a></li>
                                <li><a href="index.html">Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul><!--headmenu-->
        </div>
    </div>
    
    <div class="leftpanel">
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Navigation</li>
                <li class="active"><a href="dashboard.html"><span class="iconfa-laptop"></span> Dashboard</a></li>
                <li><a href="buttons.html"><span class="iconfa-hand-up"></span> Buttons &amp; Icons</a></li>
                <li class="dropdown"><a href=""><span class="iconfa-pencil"></span> Forms</a>
                	<ul>
                    	<li><a href="forms.html">Form Styles</a></li>
                        <li><a href="wizards.html">Wizard Form</a></li>
                        <li><a href="wysiwyg.html">WYSIWYG</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href=""><span class="iconfa-briefcase"></span> UI Elements &amp; Widgets</a>
                	<ul>
                    	<li><a href="elements.html">Theme Components</a></li>
                        <li><a href="bootstrap.html">Bootstrap Components</a></li>
                        <li><a href="boxes.html">Headers &amp; Boxes</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href=""><span class="iconfa-th-list"></span> Tables</a>
                	<ul>
                    	<li><a href="table-static.html">Static Table</a></li>
                        <li class="dropdown"><a href="table-dynamic.html">Dynamic Table</a></li>
                    </ul>
                </li>
                <li><a href="media.html"><span class="iconfa-picture"></span> Media Manager</a></li>
                <li><a href="typography.html"><span class="iconfa-font"></span> Typography</a></li>
                <li><a href="charts.html"><span class="iconfa-signal"></span> Graph &amp; Charts</a></li>
                <li><a href="messages.html"><span class="iconfa-envelope"></span> Messages</a></li>
                <li><a href="calendar.html"><span class="iconfa-calendar"></span> Calendar</a></li>
                <li class="dropdown"><a href=""><span class="iconfa-book"></span> Other Pages</a>
                	<ul>
                    	<li><a href="404.html">404 Error Page</a></li>
                        <li><a href="editprofile.html">Edit Profile</a></li>
                        <li><a href="invoice.html">Invoice Page</a></li>
                        <li><a href="discussion.html">Discussion Page</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href=""><span class="iconfa-th-list"></span> Three Level Menu Sample</a>
                	<ul>
                    	<li class="dropdown"><a href="">Second Level Menu</a>
                        <ul>
                            <li><a href="">Third Level Menu</a></li>
                            <li><a href="">Another Third Level Menu</a></li>
                        </ul>
                     </li>
                    </ul>
                </li>
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>Dashboard</li>
            <li class="right">
                    <a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-tint"></i> Color Skins</a>
                    <ul class="dropdown-menu pull-right skin-color">
                        <li><a href="default">Default</a></li>
                        <li><a href="navyblue">Navy Blue</a></li>
                        <li><a href="palegreen">Pale Green</a></li>
                        <li><a href="red">Red</a></li>
                        <li><a href="green">Green</a></li>
                        <li><a href="brown">Brown</a></li>
                    </ul>
            </li>
        </ul>
        
        <div class="pageheader">
            <form action="results.html" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">
                <h5>All Features Summary</h5>
                <h1>Dashboard</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="row-fluid">
                    <div id="dashboard-left" class="span6">
                      
                        <h5 class="subtitle">Daily Statistics</h5>
                       <!-- <div id="chartplace" style="height:300px;"></div> -->
                        <div class="form-contorl"> 
                            {!! Form::open(array('url' => 'site_checker')) !!}
                             <?php  
                                    echo Form::text('url', 'example.com',['class' => 'form-contorl']);
                                    echo Form::submit('Analysis!',['class' => 'btn btn-success btn-small']);
                              ?>
                            {!! Form::close() !!}
                         
                        </div>

                        <div class="widgetbox box-success">
                            <h4 class="widgettitle">Moz Check <a class="close">×</a> <a class="minimize">–</a></h4>
                            <div class="widgetcontent">
                               <table class="table table-bordered">
                                <thead>
                                        <tr>
                                            <th>Domain</th>
                                            <th>DA</th>
                                            <th>PA</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                @if( ! empty($url))
                                                {{$url}}
                                                @endif
                                            </td>
                                            <td>
                                                @if( ! empty($domain_authority))
                                                  {{$domain_authority}}
                                                @endif
                                            </td>
                                            <td>
                                                 @if( ! empty($page_authority))
                                                   {{$page_authority}}
                                                @endif
                                            </td>
                                        <tr>
                                    </thead>
                               </table>
                            </div>
                        </div>

                         <div class="widgetbox box-success">
                            <h4 class="widgettitle">Alex Data<a class="close">×</a> <a class="minimize">–</a></h4>
                            <div class="widgetcontent">
                               <table class="table table-bordered">
                                <thead>
                                        <tr>
                                            <th>Domain</th>
                                            <th>Details</th>
                                          
                                        </tr>
                                        <tr>
                                            <td>
                                                @if( ! empty($url))
                                                {{$url}}
                                                @endif
                                            </td>
                                            <td>
                                               
                                            </td>
                                           
                                        <tr>
                                    </thead>
                               </table>
                            </div>
                        </div>


                     
                        
                    </div><!--span8-->
                    
                    <div id="dashboard-right" class="span6">
                        <div class="divider30"></div>
                        <div class="divider30"></div>
                          <div class="widgetbox box-warning">
                            <h4 class="widgettitle">Dmoz Check <a class="close">×</a> <a class="minimize">–</a></h4>
                            <div class="widgetcontent">
                               <table class="table table-bordered">
                                <thead>
                                        <tr>
                                            <th>Domain</th>
                                            <th>Is Listed</th>
                                          
                                        </tr>
                                        <tr>
                                            <td>
                                                @if( ! empty($url))
                                                {{$url}}
                                                @endif
                                            </td>
                                            <td>
                                                @if( ! empty($dmoz))
                                                  {{$dmoz}}
                                                @endif
                                            </td>
                                        <tr>
                                    </thead>
                               </table>
                            </div>
                        </div>

                        <div class="widgetbox box-warning">
                            <h4 class="widgettitle">Alexa Rank<a class="close">×</a> <a class="minimize">–</a></h4>
                            <div class="widgetcontent">
                               <table class="table table-bordered">
                                <thead>
                                        <tr>
                                            <th>Domain</th>
                                            <th>Reach Rank </th>
                                            <th>Top Country</th>
                                            <th>Top Country Rank</th>
                                            <th>Traffic Rank </th>
                                          
                                        </tr>
                                        <tr>
                                            <td>
                                                @if( ! empty($url))
                                                {{$url}}
                                                @endif
                                            </td>
                                            <td>
                                                @if( ! empty($alexa_rank['reach_rank']))
                                                  {{$alexa_rank['reach_rank']}}
                                                @endif
                                            </td>
                                            <td>
                                                @if( ! empty($alexa_rank['country']))
                                                {{$alexa_rank['country']}}
                                                @endif
                                            </td>
                                            <td>
                                                @if( ! empty($alexa_rank['country_rank']))
                                                  {{$alexa_rank['country_rank']}}
                                                @endif
                                            </td>
                                              <td>
                                                @if( ! empty($alexa_rank['traffic_rank']))
                                                  {{$alexa_rank['traffic_rank']}}
                                                @endif
                                            </td>
                                        <tr>
                                    </thead>
                               </table>
                            </div>
                        </div>
                                  
                    </div><!--span4-->

                    <ul class="shortcuts">
                            <li class="events">
                                <a href="">
                                       <span >Domain Name</span>
                                            <span class="shortcuts-label" >
                                                @if( ! empty($url))
                                                        {{$url}}
                                                @endif
                                            </span>
                                     </a>
                            </li>
                            <li class="products">
                                <a href="">
                                  <span class="shortcuts-label">Global Rank</span>
                                   <span>  @if( ! empty($alexa_data['global_rank']))
                                                {{$alexa_data['global_rank']}}
                                        @endif</span>
                                </a>
                            </li>
                            <li class="archive">
                                <a href="">
                                    <span class="shortcuts-label">Top Country Rank</span>
                                     <span> @if( ! empty($alexa_data['country']))
                                                {{$alexa_data['country']}}
                                        @endif</span>
                                </a>
                            </li>
                           
                        </ul>
                </div><!--row-fluid-->
                <div class="row-fluid">
                    <div class="span6">
                       <div class="widgetbox box-success">
                            <h4 class="widgettitle">Alexa Traffic Rank<a class="close">×</a> <a class="minimize">–</a></h4>
                            <div class="widgetcontent">
                                @if( ! empty($alexa_data['traffic_rank_graph']))
                                 <img src="{{$alexa_data['traffic_rank_graph']}}" />
                                @endif 
                            </div>
                        </div>
                      </div>
                     <div class="span6">
                         <div class="widgetbox box-warning">
                            <h4 class="widgettitle">Visitors per Country<a class="close">×</a> <a class="minimize">–</a></h4>
                            <div class="widgetcontent">
                                  <table class="table table-bordered">
                                <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Country</th>
                                            <th>Percent of Visitors</th>
                                            <th>Rank in Country</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                       @if( ! empty($alexa_data))
                                           {{  $sl=0 }}                  
                                                    @if(is_array($alexa_data['country_name']) && is_array($alexa_data['country_in_rank']) && is_array($alexa_data['country_percent_visitor']))
                                                         @foreach($alexa_data['country_name'] as $key=>$val)
                                                            {{$sl++}}
                                                            @if(array_key_exists($key, $alexa_data['country_name']) && array_key_exists($key, $alexa_data['country_in_rank']) && array_key_exists($key, $alexa_data['country_percent_visitor']))
                                                                <tr><td>{{$sl}}</td>
                                                                <td>{{$alexa_data['country_name'][$key]}}</td>
                                                                <td>{{$alexa_data['country_percent_visitor'][$key]}}</td>
                                                                <td>{{$alexa_data['country_in_rank'][$key]}}</td></tr>
                                                            @endif  
                                                         @endforeach      
                                                        @if(count($alexa_data['country_name'])==0 || count($alexa_data['country_in_rank'])==0 || count($alexa_data['country_percent_visitor'])==0  )
                                                        <tr><td colspan='4'>No data found!</td></tr>
                                                        @endif 
                                                    @endif
                                        @else
                                        <tr><td colspan='4'>No data found!</td></tr>
                                       @endif 
                                      </tbody>
                               </table>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="row-fluid">
                    <div class="span12">
                     <ul class="shortcuts">
                            <li class="events">
                                <a href="">
                                       <span >Daily Page View per Visitor</span>
                                            <span class="shortcuts-label" >
                                                @if( ! empty($alexa_data['page_view_per_visitor']))
                                                        {{$alexa_data['page_view_per_visitor']}}
                                                @endif
                                            </span>
                                     </a>
                            </li>
                            <li class="products">
                                <a href="">
                                  <span class="shortcuts-label">Daily Time on Site</span>
                                   <span>  @if( ! empty($alexa_data['daily_time_on_the_site']))
                                                {{$alexa_data['daily_time_on_the_site']}}
                                        @endif</span>
                                </a>
                            </li>
                            <li class="archive">
                                <a href="">
                                    <span class="shortcuts-label">Visitor % from Search Engines</span>
                                     <span> @if( ! empty($alexa_data['visitor_percent_from_searchengine']))
                                                {{$alexa_data['visitor_percent_from_searchengine']}}
                                        @endif</span>
                                </a>
                            </li>
                           
                        </ul>
                      </div>
                  </div>   


                <div class="row-fluid">
                    <div class="span6">
                             <div class="widgetbox box-success">
                            <h4 class="widgettitle">Top Keywords from Search Engines<a class="close">×</a> <a class="minimize">–</a></h4>
                            <div class="widgetcontent">
                               <div class="box-body chart-responsive">
                                     @if( ! empty($alexa_data['keyword_name']))
                                                    @if(is_array($alexa_data['keyword_name']) && is_array($alexa_data['keyword_percent_of_search_traffic']))
                                                         @foreach($alexa_data['keyword_name'] as $key=>$val)
                                                            @if(array_key_exists($key, $alexa_data['keyword_name']) && array_key_exists($key, $alexa_data['keyword_percent_of_search_traffic']) && array_key_exists($key, $alexa_data['country_percent_visitor']))
                                                                   {{$alexa_data['keyword_name'][$key]}}<span class='pull-right'><b>{{$alexa_data['keyword_percent_of_search_traffic'][$key]}}</b></span>
                                                                    <div class="progress">					                    	
                                                                    <div class="progress-bar progress-bar-striped " role="progressbar" aria-valuenow="{{$alexa_data['keyword_percent_of_search_traffic'][$key]}}" aria-valuemin="0" aria-valuemax="100" style="width:'{{$alexa_data['keyword_percent_of_search_traffic'][$key]}}[$key]">
                                                                    </div>
                                                                    </div>
                                                            @endif  
                                                         @endforeach      
                                                        @if(count($alexa_data['country_name'])==0 || count($alexa_data['country_in_rank'])==0 || count($alexa_data['country_percent_visitor'])==0  )
                                                        <tr><td colspan='4'>No data found!</td></tr>
                                                        @endif 
                                                    @endif
                                        @else
                                        <tr><td colspan='4'>No data found!</td></tr>
                                       @endif 
                                </div>
                            </div>
                        </div>
                    </div>

                      <div class="span6">
                       <div class="widgetbox box-warning">
                            <h4 class="widgettitle">Search Traffic<a class="close">×</a> <a class="minimize">–</a></h4>
                            <div class="widgetcontent">
                                @if( ! empty($alexa_data['search_engine_percentage_graph']))
                                 <img src="{{$alexa_data['search_engine_percentage_graph']}}" />
                                @endif 
                            </div>
                        </div>
                     </div>
                </div>

                <div class="row-fluid">
                    <div class="span6">
                        <div class="inner">
                         @if( ! empty($alexa_data['search_engine_percentage_graph']))
                        <h3><span id="average_stay_time">{{$alexa_data['total_site_linking_in']}}</span></h3>
                        <p>Total Linking In Site</p>
                        @endif 
				    </div>
                </div>
                    <div class="span6">
                           <div class="inner">
                         @if( ! empty($alexa_data['bounce_rate']))
                        <h3><span id="average_stay_time">{{$alexa_data['bounce_rate']}}</span></h3>
                        <p>Bounce Rate</p>
                        @endif 
				        </div>
                    </div>
                </div>    


                 <div class="row-fluid">
                    <div class="span12">
                         <div class="widgetbox box-warning">
                            <h4 class="widgettitle">Linking In Statistics<a class="close">×</a> <a class="minimize">–</a></h4>
                            <div class="widgetcontent">
                                  <table class="table table-bordered">
                                <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Site</th>
                                            <th>Page</th>
                                             </tr>
                                    </thead>
                                     <tbody>
                                       @if( !empty($alexa_data))
                                           {{  $sl=0 }}                  
                                                    @if(is_array($alexa_data['linking_in_site_name']) && is_array($alexa_data['linking_in_site_address']))
                                                         @foreach($alexa_data['linking_in_site_name'] as $key=>$val)
                                                            
                                                            @if(array_key_exists($key, $alexa_data['linking_in_site_name']) && array_key_exists($key, $alexa_data['linking_in_site_address']))
                                                                <tr><td>{{$sl}}</td>
                                                                <td>{{$alexa_data['linking_in_site_name'][$key]}}</td>
                                                                <td>{{$alexa_data['linking_in_site_address'][$key]}}</td>
                                                                </tr>
                                                            @endif  
                                                         @endforeach      
                                                        @if(count($alexa_data['linking_in_site_name'])==0 || count($alexa_data['linking_in_site_address'])==0)
                                                        <tr><td colspan='4'>No data found!</td></tr>
                                                        @endif 
                                                    @endif
                                        @else
                                        <tr><td colspan='4'>No data found!</td></tr>
                                       @endif 
                                      </tbody>
                               </table>
                            </div>
                        </div>
                    </div>
                 </div>

                 <div class="row-fluid">
                      <div class="span6">
                             <div class="widgetbox box-success">
                            <h4 class="widgettitle">Upstream Sites<a class="close">×</a> <a class="minimize">–</a></h4>
                            <div class="widgetcontent">
                               <div class="box-body chart-responsive">
                                     @if( ! empty($alexa_data['upstream_site_name']))
                                                    @if(is_array($alexa_data['upstream_site_name']) && is_array($alexa_data['upstream_percent_unique_visits']))
                                                         @foreach($alexa_data['upstream_site_name'] as $key=>$val)
                                                            @if(array_key_exists($key, $alexa_data['upstream_site_name']) && array_key_exists($key, $alexa_data['upstream_percent_unique_visits']))
                                                                   {{$alexa_data['upstream_site_name'][$key]}}<span class='pull-right'><b>{{$alexa_data['upstream_percent_unique_visits'][$key]}}</b></span>
                                                                    <div class="progress">					                    	
                                                                    <div class="progress-bar progress-bar-striped " role="progressbar" aria-valuenow="{{$alexa_data['upstream_percent_unique_visits'][$key]}}" aria-valuemin="0" aria-valuemax="100" style="width:'{{$alexa_data['upstream_percent_unique_visits'][$key]}}[$key]">
                                                                    </div>
                                                                    </div>
                                                            @endif  
                                                         @endforeach      
                                                        @if(count($alexa_data['upstream_site_name'])==0 || count($alexa_data['upstream_percent_unique_visits'])==0  )
                                                        <tr><td colspan='4'>No data found!</td></tr>
                                                        @endif 
                                                    @endif
                                        @else
                                        <tr><td colspan='4'>No data found!</td></tr>
                                       @endif 
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="span6">
                             <div class="widgetbox box-success">
                            <h4 class="widgettitle">Subdomain Statistics<a class="close">×</a> <a class="minimize">–</a></h4>
                            <div class="widgetcontent">
                               <div class="box-body chart-responsive">
                                     @if( ! empty($alexa_data['subdomain_name']))
                                                    @if(is_array($alexa_data['subdomain_name']) && is_array($alexa_data['subdomain_percent_visitors']))
                                                         @foreach($alexa_data['subdomain_name'] as $key=>$val)
                                                            @if(array_key_exists($key, $alexa_data['subdomain_name']) && array_key_exists($key, $alexa_data['subdomain_percent_visitors']))
                                                                   {{$alexa_data['subdomain_name'][$key]}}<span class='pull-right'><b>{{$alexa_data['subdomain_percent_visitors'][$key]}}</b></span>
                                                                    <div class="progress">					                    	
                                                                    <div class="progress-bar progress-bar-striped " role="progressbar" aria-valuenow="{{$alexa_data['subdomain_percent_visitors'][$key]}}" aria-valuemin="0" aria-valuemax="100" style="width:'{{$alexa_data['subdomain_percent_visitors'][$key]}}[$key]">
                                                                    </div>
                                                                    </div>
                                                            @endif  
                                                         @endforeach      
                                                        @if(count($alexa_data['subdomain_name'])==0 || count($alexa_data['subdomain_percent_visitors'])==0  )
                                                        <tr><td colspan='4'>No data found!</td></tr>
                                                        @endif 
                                                    @endif
                                        @else
                                        <tr><td colspan='4'>No data found!</td></tr>
                                       @endif 
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>    
                
                <div class="row-fluid">
                    <div class="span12">
                      <div class="widgetbox box-warning">
                            <h4 class="widgettitle">Google Backlink Search<a class="close">×</a> <a class="minimize">–</a></h4>
                            <div class="widgetcontent">
                               <table class="table table-bordered">
                                <thead>
                                        <tr>
                                            <th>Domain</th>
                                            <th>Back Link Count</th>
                                          
                                        </tr>
                                        <tr>
                                            <td>
                                                @if( ! empty($url))
                                                {{$url}}
                                                @endif
                                            </td>
                                            <td>
                                                @if( ! empty($external_equity_links))
                                                  {{$external_equity_links}}
                                                @endif
                                            </td>
                                        <tr>
                                    </thead>
                               </table>
                            </div>
                        </div>
				    </div>
                  </div>    
                </div>  

                 <div class="row-fluid">
                    <div class="span12">
                         <div class="widgetbox box-warning">
                            <h4 class="widgettitle">Social Network Analysis<a class="close">×</a> <a class="minimize">–</a></h4>
                            <div class="widgetcontent">
                              @if( ! empty($url))
                                  <table class="table table-bordered">
                                <thead>
                                        <tr>
                                            <th>Facebook Share</th>
                                            <th>FaceBook Like</th>
                                            <th>FaceBook Comment</th>
                                            <th>Google Plus Share</th>
                                            <th>Linkdin Share</th>
                                            <th>Buffer Share</th>
                                            <th>Pintrest Count</th>
                                            <th>xing_count</th>
                                            <th>Stumbleupon Total Like</th>
                                            <th>Stumbleupon Total Comment</th>
                                            <th>Stumbleupon Total List</th>

                                            <th>Reddit Score</th>
                                            <th>Reddit Down</th>
                                            <th>Reddit Ups</th>

                                            
                                        </tr>
                                    </thead>
                                     <tbody>
                                      <tr>
                                             <td>{{$fb['total_share']}}</td>
                                             <td>{{$fb['total_like']}}</td>
                                             <td>{{$fb['total_comment']}}</td>
                                             <td>{{$google_plus_share}}</td>
                                             <td>{{$linkdin_share}}</td>
                                             <td>{{$buffer_share}}</td>
                                             <td>{{$pintrest_count}}</td>
                                             <td>{{$xing_count}}</td>
                                             <td>{{$stumbleupon['stumbleupon_total_like']}}</td>
                                             <td>{{$stumbleupon['stumbleupon_total_comment']}}</td>
                                             <td>{{$stumbleupon['stumbleupon_total_list']}}</td>
                                             <td>{{$reddit_share['score']}}</td>
                                             <td>{{$reddit_share['downs']}}</td>
                                             <td>{{$reddit_share['ups']}}</td>
                                      </tr>
                                     </tbody>
                               </table>
                               @endif
                            </div>
                        </div>
                    </div>
                 </div>  

                <div class="footer">
                    <div class="footer-left">
                        <span>&copy; 2013. Shamcey Admin Template. All Rights Reserved.</span>
                    </div>
                    <div class="footer-right">
                        <span>Designed by: <a href="http://themepixels.com/">ThemePixels</a></span>
                    </div>
                </div><!--footer-->
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->
<script type="text/javascript">
    jQuery(document).ready(function() {
        
      // simple chart
		var flash = [[0, 11], [1, 9], [2,12], [3, 8], [4, 7], [5, 3], [6, 1]];
		var html5 = [[0, 5], [1, 4], [2,4], [3, 1], [4, 9], [5, 10], [6, 13]];
      var css3 = [[0, 6], [1, 1], [2,9], [3, 12], [4, 10], [5, 12], [6, 11]];
			
		function showTooltip(x, y, contents) {
			jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5
			}).appendTo("body").fadeIn(200);
		}
	
			
		var plot = jQuery.plot(jQuery("#chartplace"),
			   [ { data: flash, label: "Flash(x)", color: "#6fad04"},
              { data: html5, label: "HTML5(x)", color: "#06c"},
              { data: css3, label: "CSS3", color: "#666"} ], {
				   series: {
					   lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
					   points: { show: true }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#666', borderWidth: 2, labelMargin: 10 },
				   yaxis: { min: 0, max: 15 }
				 });
		
		var previousPoint = null;
		jQuery("#chartplace").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
						
					jQuery("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
						
					showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
				}
			
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		
		});
		
		jQuery("#chartplace").bind("plotclick", function (event, pos, item) {
			if (item) {
				jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot.highlight(item.series, item.datapoint);
			}
		});
    
        
        //datepicker
        jQuery('#datepicker').datepicker();
        
        // tabbed widget
        jQuery('.tabbedwidget').tabs();
        
        
    
    });
</script>
@stop