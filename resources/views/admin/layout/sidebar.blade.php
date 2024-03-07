 
 <!-- left sidebar -->
      <?php $data_for_url = session('data_for_url'); ?>
      <style>
        .sidebar li .submenu{ 
	list-style: none; 
	margin: 0; 
	padding: 0; 
	padding-left: 1rem; 
	padding-right: 1rem;
}
        </style>
      <nav class="sidebar sidebar-offcanvas fixed-nav" id="sidebar">
          <ul class="nav">
              <li class="nav-item nav-profile">
                  <div class="nav-link">
                      {{-- <div class="profile-image">
                          <img src="images/faces/face5.jpg" alt="image" />
                      </div> --}}
                      <div class="profile-name">
                          <p class="name">
                              Welcome Admin
                          </p>
                          {{-- <p class="designation">
                              Super Admin
                          </p> --}}
                      </div>
                  </div>
              </li>
              {{-- @if (in_array('dashboard', $data_for_url)) --}}
              <li
              class="{{request()->is('dashboard*') 
                    ? 'nav-item active' : 'nav-item' }}">
                  <a class="{{request()->is('dashboard*') 
                                    ? 'nav-link active' : 'nav-link' }}" href="{{ route('/dashboard') }}">
                      <i class="fa fa-home menu-icon"></i>
                      <span class="menu-title">Dashboard</span>
                  </a>
              </li>    
              {{-- @endif           --}}
              @if (in_array('list-role', $data_for_url) ||
                      in_array('list-incident-type', $data_for_url))
                  <li class="{{request()->is('list-role*') 
                    ? 'nav-item active' : 'nav-item' }}">
                      <a class="{{request()->is('list-role*') 
                                    ? 'nav-link active' : 'nav-link' }}" data-toggle="collapse" href="#master" aria-expanded="false"
                          aria-controls="master">
                          <i class="fa fa-th-large menu-icon"></i>
                          <span class="menu-title">Master</span>
                          <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="master">
                          <ul class="nav flex-column sub-menu">
                              @if (in_array('list-role', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="{{request()->is('list-role*') 
                                    ? 'nav-link active' : 'nav-link' }}"
                                          href="{{ route('list-role') }}">Role</a></li>
                              @endif
                              @if (in_array('list-incident-type', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="{{request()->is('list-incident-type*') 
                                    ? 'nav-link active' : 'nav-link' }}"
                                          href="{{ route('list-incident-type') }}">Incident Type</a></li>
                              @endif
                          </ul>
                      </div>
                  </li>
              @endif
              @if (in_array('list-landing-slide', $data_for_url) ||
              in_array('list-landing-content', $data_for_url))
              <li  class="{{request()->is('list-landing-slide*') 
                ? 'nav-item active' : 'nav-item' }}">
                  <a class="nav-link" data-toggle="collapse" href="#landing-slider" aria-expanded="false"
                      aria-controls="landing-slider">
                      <i class="fas fa-newspaper fa-lg "></i>
                      <span class="pl-2 menu-title">Landing</span>
                      <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="landing-slider">
                      <ul class="nav flex-column sub-menu">
                          @if (in_array('list-landing-slide', $data_for_url))
                              <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                      href="{{ route('list-landing-slide') }}">Landing Slider</a>
                              </li>
                          @endif
                          @if (in_array('list-landing-content', $data_for_url))
                              <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                      href="{{ route('list-landing-content') }}">Landing Content</a>
                              </li>
                          @endif
                        
                      </ul>
                  </div>
              </li>
          @endif
              @if (in_array('list-header-vacancies', $data_for_url) ||
               in_array('list-header-rti', $data_for_url) || 
               in_array('list-tollfree-number', $data_for_url) || 
               in_array('list-website-logo', $data_for_url) || 
               in_array('list-main-menu', $data_for_url) ||
                in_array('list-sub-menu', $data_for_url))
                  <li class="{{request()->is('list-header-rti*') 
                    ? 'nav-item active' : 'nav-item' }}">
                      <a class="nav-link" data-toggle="collapse" href="#menu" aria-expanded="false"
                          aria-controls="menu">
                          <i class="fas fa-bars fa-lg menu-icon"></i>
                          <span class="menu-title">Header</span>
                          <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="menu">
                          <ul class="nav flex-column sub-menu">
                            @if (in_array('list-header-vacancies', $data_for_url))
                            <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                    href="{{ route('list-header-vacancies') }}">Vacancies</a></li>
                             @endif
                             @if (in_array('list-header-rti', $data_for_url))
                             <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                     href="{{ route('list-header-rti') }}">RTI</a></li>
                              @endif
                              @if (in_array('list-tollfree-number', $data_for_url))
                              <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                      href="{{ route('list-tollfree-number') }}">Toll Free Number</a></li>
                               @endif
                               @if (in_array('list-website-logo', $data_for_url))
                               <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                       href="{{ route('list-website-logo') }}">Website Logo</a></li>
                                @endif
                              @if (in_array('list-main-menu', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-main-menu') }}">Main Menu</a></li>
                              @endif
                              @if (in_array('list-sub-menu', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-sub-menu') }}">Sub Menu</a></li>
                              @endif
                          @if (in_array('list-sub-header-info', $data_for_url))
                              <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                      href="{{ route('list-sub-header-info') }}">Sub Header</a></li>
                          @endif
                          </ul>
                      </div>
                  </li>
              @endif
              @if (in_array('list-important-link', $data_for_url)||
              in_array('list-website-contact', $data_for_url)||
              in_array('list-tweeter-feed', $data_for_url)||
              in_array('list-privacy-policy', $data_for_url)||
              in_array('list-terms-conditions', $data_for_url)||
              in_array('list-social-icon', $data_for_url))
                 <li class="nav-item">
                     <a class="nav-link" data-toggle="collapse" href="#footer" aria-expanded="false"
                         aria-controls="footer">
                         <i class="fas fa-address-card fa-lg menu-icon"></i>
                         <span class="menu-title">Footer</span>
                         <i class="menu-arrow"></i>
                     </a>
                     <div class="collapse" id="footer">
                         <ul class="nav flex-column sub-menu">
                           @if (in_array('list-important-link', $data_for_url))
                           <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                   href="{{ route('list-important-link') }}">Footer Links</a></li>
                            @endif
                            @if (in_array('list-website-contact', $data_for_url))
                            <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                    href="{{ route('list-website-contact') }}">Website Contact</a></li>
                             @endif
                             @if (in_array('list-tweeter-feed', $data_for_url))
                             <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                     href="{{ route('list-tweeter-feed') }}">Twitter Link</a></li>
                              @endif

                              @if (in_array('list-privacy-policy', $data_for_url))
                              <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                      href="{{ route('list-privacy-policy') }}">Privacy Policy</a></li>
                               @endif
                               @if (in_array('list-terms-conditions', $data_for_url))
                               <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                       href="{{ route('list-terms-conditions') }}">Terms and Conditions</a></li>
                                @endif
                             
                            @if (in_array('list-social-icon', $data_for_url))
                            <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                    href="{{ route('list-social-icon') }}">Social Icon</a></li>
                            @endif
                         </ul>
                     </div>
                 </li>
             @endif
              @if (in_array('list-dynamic-page', $data_for_url))
                  <li class="{{request()->is('list-dynamic-page*') 
                    ? 'nav-item active' : 'nav-item' }}">
                      <a class="nav-link" data-toggle="collapse" href="#pages" aria-expanded="false"
                          aria-controls="pages">
                          <i class="fas fa-file-alt fa-lg menu-icon"></i>
                          <span class="menu-title">Pages</span>
                          <i class="menu-arrow"></i>
                      </a>

                      <div class="collapse" id="pages">
                          <ul class="nav flex-column sub-menu">
                              <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                      href="{{ route('list-dynamic-page') }}">Dynamic Pages</a></li>
                          </ul>
                      </div>
                  </li>
              @endif

              @if (in_array('list-marquee', $data_for_url) ||
                      in_array('list-slide', $data_for_url) ||
                      in_array('list-disaster-management-web-portal', $data_for_url) ||
                      in_array('list-disaster-management-news', $data_for_url) ||
                      in_array('list-disasterforcast', $data_for_url) ||
                      in_array('list-emergency-contact', $data_for_url) ||
                      in_array('list-department-information', $data_for_url) ||
                      in_array('list-general-contact', $data_for_url))

                  <li class="{{request()->is('list-general-contact*') 
                    ? 'nav-item active' : 'nav-item' }}">
                      <a class="nav-link" data-toggle="collapse" href="#home" aria-expanded="false"
                          aria-controls="home">
                          <i class="fas fa-home fa-lg menu-icon"></i>
                          <span class="menu-title">Home</span>
                          <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="home">
                          <ul class="nav flex-column sub-menu">

                              @if (in_array('list-marquee', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-marquee') }}">News Bar</a></li>
                              @endif
                              @if (in_array('list-slide', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-slide') }}">Slider</a></li>
                              @endif
                              @if (in_array('list-disaster-management-web-portal', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-disaster-management-web-portal') }}">Welcome Section</a></li>
                              @endif
                              @if (in_array('list-disaster-management-news', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-disaster-management-news') }}">Disaster Management News</a></li>
                              @endif
                              @if (in_array('list-emergency-contact', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-emergency-contact') }}">Emergency Contact</a></li>
                              @endif
                              {{-- @if (in_array('list-weather', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-weather') }}">Weather</a></li>
                              @endif --}}
                              @if (in_array('list-disasterforcast', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-disasterforcast') }}">Disaster Forecast</a></li>
                              @endif

                              @if (in_array('list-home-tender', $data_for_url))
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-home-tender') }}">Tenders</a></li>
                          @endif
                          @if (in_array('list-general-contact', $data_for_url))
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-general-contact') }}">General Contact</a></li>
                          @endif
                              @if (in_array('list-department-information', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-department-information') }}">Department Information</a>
                                  </li>
                              @endif
                          </ul>
                      </div>
                  </li>
              @endif

              @if (in_array('list-disastermanagementportal', $data_for_url) ||
                      in_array('list-objectivegoals', $data_for_url) ||
                      in_array('list-statedisastermanagementauthority', $data_for_url))
                  <li class="{{request()->is('list-statedisastermanagementauthority*') 
                    ? 'nav-item active' : 'nav-item' }}">
                      <a class="nav-link" data-toggle="collapse" href="#aboutus" aria-expanded="false"
                          aria-controls="aboutus">
                          <i class="fas fa-address-card fa-lg menu-icon"></i>
                          <span class="menu-title">About Us</span>
                          <i class="menu-arrow"></i>
                      </a>

                      <div class="collapse" id="aboutus">
                          <ul class="nav flex-column sub-menu">
                              @if (in_array('list-disastermanagementportal', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-disastermanagementportal') }}">Disaster Management Portal</a>
                                  </li>
                              @endif
                              @if (in_array('list-objectivegoals', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-objectivegoals') }}">Objective Goals</a></li>
                              @endif

                              @if (in_array('list-statedisastermanagementauthority', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-statedisastermanagementauthority') }}">State Disaster Management Authority</a></li>
                              @endif


                          </ul>
                      </div>
                  </li>
              @endif
              @if (in_array('list-hazard-vulnerability-assessment', $data_for_url) ||
                      in_array('list-early-warning-system', $data_for_url) ||
                      in_array('list-public-awareness-and-education', $data_for_url)||
                      in_array('list-govt-hospitals', $data_for_url))
                  <li class="{{request()->is('list-govt-hospitals*') 
                    ? 'nav-item active' : 'nav-item' }}">
                      <a class="nav-link" data-toggle="collapse" href="#preparedness" aria-expanded="false"
                          aria-controls="preparedness">
                          <i class="fas fa-toolbox fa-lg menu-icon"></i>
                          <span class="menu-title">Preparedness</span>
                          <i class="menu-arrow"></i>
                      </a>

                      <div class="collapse" id="preparedness">
                          <ul class="nav flex-column sub-menu">
                              @if (in_array('list-hazard-vulnerability-assessment', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-hazard-vulnerability-assessment') }}">Hazard and Vulnerability</a>
                                  </li>
                              @endif
                              @if (in_array('list-early-warning-system', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-early-warning-system') }}">Early Warning System</a>
                                  </li>
                              @endif
                             
                              @if (in_array('list-public-awareness-and-education', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                                          href="{{ route('list-public-awareness-and-education') }}">Awareness And Education </a>
                                  </li>
                              @endif
                              @if (in_array('list-govt-hospitals', $data_for_url))
                              <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                                      href="{{ route('list-govt-hospitals') }}">Government Hospitals </a>
                              </li>
                          @endif
                          </ul>
                      </div>
                  </li>
              @endif
              @if (in_array('list-state-emergency-operations-center', $data_for_url) ||
                      in_array('list-district-emergency-operations-center', $data_for_url) ||
                      in_array('edit-emergency-contact-numbers', $data_for_url) ||
                      in_array('list-evacuation-plans', $data_for_url) ||
                      in_array('list-relief-measures-resources', $data_for_url) ||
                      in_array('list-search-rescue-teams', $data_for_url))
                  <li class="{{request()->is('list-search-rescue-teams*') 
                    ? 'nav-item active' : 'nav-item' }}">
                      <a class="nav-link" data-toggle="collapse" href="#emergency-response" aria-expanded="false"
                          aria-controls="emergency-response">
                          <i class="fas fa-first-aid fa-lg menu-icon"></i>
                          <span class="menu-title">Emergency Response</span>
                          <i class="menu-arrow"></i>
                      </a>

                      <div class="collapse" id="emergency-response">
                          <ul class="nav flex-column sub-menu">
                              @if (in_array('list-state-emergency-operations-center', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-state-emergency-operations-center') }}">State Emergency Operations Center (EOC)</a>
                                  </li>
                              @endif
                              @if (in_array('list-district-emergency-operations-center', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-district-emergency-operations-center') }}">District Emergency Operations Center (DEOC)</a>
                                  </li>
                              @endif
                              @if (in_array('edit-emergency-contact-numbers', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('edit-emergency-contact-numbers') }}">Emergency Contact Numbers</a>
                                  </li>
                              @endif
                              @if (in_array('list-evacuation-plans', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-evacuation-plans') }}">Evacuation Plans</a>
                                  </li>
                              @endif
                              @if (in_array('list-relief-measures-resources', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-relief-measures-resources') }}">Relief Measures Resources</a>
                                  </li>
                              @endif
                              @if (in_array('list-search-rescue-teams', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-search-rescue-teams') }}">Search Rescue Teams</a>
                                  </li>
                              @endif
                          </ul>
                      </div>
                  </li>
              @endif
              @if (in_array('list-incident-modal-info', $data_for_url) ||
                      in_array('list-volunteer-modal-info', $data_for_url))
                  <li class="{{request()->is('list-volunteer-modal-info*') 
                    ? 'nav-item active' : 'nav-item' }}">
                      <a class="nav-link" data-toggle="collapse" href="#citizen-action" aria-expanded="false"
                          aria-controls="citizen-action">
                          <i class="fas fa-building fa-lg menu-icon"></i>
                          <span class="menu-title">Citizen Action</span>
                          <i class="menu-arrow"></i>
                      </a>

                      <div class="collapse" id="citizen-action">
                          <ul class="nav flex-column sub-menu">
                              @if (in_array('list-incident-modal-info', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-incident-modal-info') }}">List Report Incident</a>
                                  </li>
                              @endif
                              @if (in_array('list-volunteer-modal-info', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-volunteer-modal-info') }}">List Report Volunteer</a>
                                  </li>
                              @endif
                             

                          </ul>
                      </div>
                  </li>
              @endif
              {{-- @if (in_array('list-event', $data_for_url))
                  <li class="{{request()->is('list-event*') 
                    ? 'nav-item active' : 'nav-item' }}">
                      <a class="nav-link" href="{{ route('list-event') }}">
                          <i class="fas fa-window-restore menu-icon"></i>
                          <span class="menu-title">Training Workshops</span>
                      </a>
                  </li>
              @endif --}}
              @if (in_array('list-list-capacity-training', $data_for_url) ||
                      in_array('list-training-workshop', $data_for_url))
                  <li class="{{request()->is('list-training-workshop*') 
                    ? 'nav-item active' : 'nav-item' }}">
                      <a class="nav-link" data-toggle="collapse" href="#trainingevent" aria-expanded="false"
                          aria-controls="trainingevent">
                          <i class="fas fa-toolbox fa-lg menu-icon"></i>
                          <span class="menu-title">Training Workshops</span>
                          <i class="menu-arrow"></i>
                      </a>

                      <div class="collapse" id="trainingevent">
                          <ul class="nav flex-column sub-menu">
                           
                              @if (in_array('list-list-capacity-training', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                                          href="{{ route('list-list-capacity-training') }}">Capacity Training</a>
                                  </li>
                              @endif
                              @if (in_array('list-training-workshop', $data_for_url))
                                <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                        href="{{ route('list-training-workshop') }}">Training Materials</a>
                                </li>
                                @endif
                          </ul>
                      </div>
                  </li>
              @endif


              @if (in_array('list-state-disaster-management-plan', $data_for_url) ||
                      in_array('list-district-disaster-management-plan', $data_for_url) ||
                      in_array('list-state-disaster-management-policy', $data_for_url) ||
                      in_array('list-relevant-laws-and-regulations', $data_for_url))
                  <li class="{{request()->is('list-relevant-laws-and-regulations*') 
                    ? 'nav-item active' : 'nav-item' }}">
                      <a class="nav-link" data-toggle="collapse" href="#policie-legislation" aria-expanded="false"
                          aria-controls="policie-legislation">
                          <i class="fa fa-th-large menu-icon menu-icon"></i>
                          <span class="menu-title">Policies and Guidelines</span>
                          <i class="menu-arrow"></i>
                      </a>

                      <div class="collapse" id="policie-legislation">
                          <ul class="nav flex-column sub-menu">
                              @if (in_array('list-state-disaster-management-plan', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-state-disaster-management-plan') }}">State Disaster Management Plan</a>
                                  </li>
                              @endif
                              @if (in_array('list-district-disaster-management-plan', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-district-disaster-management-plan') }}">District Disaster Management Plan</a>
                                  </li>
                              @endif
                              @if (in_array('list-state-disaster-management-policy', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-state-disaster-management-policy') }}">Disaster Management Policies</a>
                                  </li>
                              @endif
                              @if (in_array('list-relevant-laws-and-regulations', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-relevant-laws-and-regulations') }}">Relevant-Laws-And-Regulations
                                      </a>
                                  </li>
                              @endif
                              @if (in_array('list-disaster-management-act', $data_for_url))
                              <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                      href="{{ route('list-disaster-management-act') }}">Disaster Management Act
                                  </a>
                              </li>
                          @endif
                          @if (in_array('list-disaster-management-guidelines', $data_for_url))
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-disaster-management-guidelines') }}">Disaster Management Guidelines
                              </a>
                          </li>
                      @endif
                          </ul>
                      </div>
                  </li>
              @endif
              @if (in_array('list-document-publications', $data_for_url) ||
              in_array('list-map-lat-lons', $data_for_url) ||
              in_array('list-gallery', $data_for_url) ||
              in_array('list-gallery-category', $data_for_url) ||
              in_array('list-video', $data_for_url))
                  <li class="{{request()->is('list-video*') 
                    ? 'nav-item active' : 'nav-item' }}">
                      <a class="nav-link" data-toggle="collapse" href="#resource-center" aria-expanded="false"
                          aria-controls="resource-center">
                          <i class="fas fa-search fa-lg menu-icon"></i>
                          <span class="menu-title">Resource Center</span>
                          <i class="menu-arrow"></i>
                      </a>

                      <div class="collapse" id="resource-center">
                            <ul class="nav flex-column sub-menu">
                                @if (in_array('list-document-publications', $data_for_url))
                                    <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                            href="{{ route('list-document-publications') }}">Documents And Publications</a>
                                    </li>
                                @endif
                                @if (in_array('list-map-lat-lons', $data_for_url))
                                    <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                            href="{{ route('list-map-lat-lons') }}">MAP GIS Data</a>
                                    </li>
                                @endif
                                @if (in_array('list-gallery-category', $data_for_url))
                                <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                        href="{{ route('list-gallery-category') }}">Gallery Category</a>
                                </li>
                                @endif
                                @if (in_array('list-gallery', $data_for_url))
                                    <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                            href="{{ route('list-gallery') }}">Gallery</a>
                                    </li>
                                @endif
                                @if (in_array('list-video', $data_for_url))
                                    <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                            href="{{ route('list-video') }}">Video</a>
                                    </li>
                                @endif
                               
                            </ul>
                      </div>
                  </li>
              @endif
              @if (in_array('list-success-stories', $data_for_url) ||in_array('list-event', $data_for_url))
                  <li  class="{{request()->is('list-event*') 
                    ? 'nav-item active' : 'nav-item' }}">
                      <a class="nav-link" data-toggle="collapse" href="#news-events-tab" aria-expanded="false"
                          aria-controls="news-events-tab">
                          <i class="fas fa-newspaper fa-lg "></i>
                          <span class="pl-2 menu-title">News And Events </span>
                          <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="news-events-tab">
                          <ul class="nav flex-column sub-menu">
                              @if (in_array('list-success-stories', $data_for_url))
                                  <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                          href="{{ route('list-success-stories') }}">Success Stories</a>
                                  </li>
                              @endif
                              @if (in_array('list-event', $data_for_url))
                              <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                      href="{{ route('list-event') }}">Event</a>
                              </li>
                          @endif
                          </ul>
                      </div>
                  </li>
              @endif
              @if (in_array('list-contact-suggestion', $data_for_url))
                  <li class="{{request()->is('list-contact-suggestion*') 
                    ? 'nav-item active' : 'nav-item' }}">
                      <a class="nav-link" href="{{ route('list-contact-suggestion') }}">
                          <i class="fas fa-window-restore menu-icon"></i>
                          <span class="menu-title">Contact Us</span>
                      </a>
                  </li>
              @endif
              @if (in_array('list-metadata', $data_for_url))
                  <li class="{{request()->is('list-metadata*') 
                    ? 'nav-item active' : 'nav-item' }}">
                      <a class="nav-link" href="{{ route('list-metadata') }}">
                          <i class="fas fa-window-restore menu-icon"></i>
                          <span class="menu-title">Metadata</span>
                      </a>
                  </li>
              @endif
              {{-- @if (in_array('list-users', $data_for_url))
                  <li class="{{request()->is('list-users*') 
                    ? 'nav-item active' : 'nav-item' }}">
                      <a class="nav-link" data-toggle="collapse" href="#master-management" aria-expanded="false"
                          aria-controls="master-management">
                          <i class="fas fa-user menu-icon"></i>
                          <span class="menu-title">User Management</span>
                          <i class="menu-arrow"></i>
                      </a>
                      @if (in_array('list-users', $data_for_url))
                          <?php //$currenturl = Request::url(); ?>
                          <div class="collapse" id="master-management">
                              <ul class="nav flex-column sub-menu">
                                  <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                                          href="{{ route('list-users') }}">Users Master</a></li>
                              </ul>
                          </div>
                      @endif
                  </li>
              @endif --}}
              @if (in_array('list-users', $data_for_url))

              <li class="{{request()->is('list-users*')

                ? 'nav-item active' : 'nav-item' }}">

                <?php $currenturl = Request::url(); ?>

                  <a class="nav-link" href="{{ route('list-users') }}">

                      <i class="fas fa-user menu-icon"></i>

                      <span class="menu-title">Users Management</span>

                  </a>

              </li>

          @endif
               {{--@if (in_array('db-backup', $data_for_url)) --}}
                  {{-- <li class="{{request()->is('db-backup*') 
                    ? 'nav-item active' : 'nav-item' }}">
                      <a class="nav-link" data-toggle="collapse" href="#db-backup" aria-expanded="false"
                          aria-controls="db-backup">
                          <i class="fas fa-user menu-icon"></i>
                          <span class="menu-title">Data Base Backup</span>
                          <i class="menu-arrow"></i>
                      </a> --}}
                     {{-- @if (in_array('db-backup', $data_for_url)) --}}
                          {{-- <?php //$currenturl = Request::url(); ?>
                          <div class="collapse" id="db-backup">
                              <ul class="nav flex-column sub-menu">
                                  <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                                          href="{{ route('db-backup') }}">Data Base Backup</a></li>
                              </ul>
                          </div> --}}
                     {{-- @endif --}}
                  {{-- </li> --}}

                  @if (in_array('list-users', $data_for_url))

                  <li class="{{request()->is('db-backup*')

                    ? 'nav-item active' : 'nav-item' }} ">

                    <?php $currenturl = Request::url(); ?>

                      <a class="nav-link" href="{{ route('db-backup') }}">

                          <i class="fas fa-user menu-icon"></i>

                          <span class="menu-title">Data Base Backup</span>

                      </a>

                  </li>

              @endif
             {{-- @endif --}}
          </ul>
      </nav>
<!-- partial -->

      <script>
        
      </script>