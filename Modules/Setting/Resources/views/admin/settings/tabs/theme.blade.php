<div class="form-group">
    <label class="form-label">{{ clean(trans('setting::settings.form.logo_header')) }}</label>
    <div class="row gutters-xs theme-switch-block">
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_logo_header_color" type="radio" value="dark" class="colorinput-input changeLogoHeaderColor" {{ $settings['theme_logo_header_color']=='dark' ? 'checked' : '' }}>
                <span class="colorinput-color dark"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_logo_header_color" type="radio" value="blue" class="colorinput-input changeLogoHeaderColor" {{ $settings['theme_logo_header_color']=='blue' ? 'checked' : '' }}>
                <span class="colorinput-color blue"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_logo_header_color" type="radio" value="purple" class="colorinput-input changeLogoHeaderColor" {{ $settings['theme_logo_header_color']=='purple' ? 'checked' : '' }}>
                <span class="colorinput-color purple"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_logo_header_color" type="radio" value="light-blue" class="colorinput-input changeLogoHeaderColor" {{ $settings['theme_logo_header_color']=='light-blue' ? 'checked' : '' }}>
                <span class="colorinput-color light-blue"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_logo_header_color" type="radio" value="green" class="colorinput-input changeLogoHeaderColor" {{ $settings['theme_logo_header_color']=='green' ? 'checked' : '' }}>
                <span class="colorinput-color green"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_logo_header_color" type="radio" value="orange" class="colorinput-input changeLogoHeaderColor" {{ $settings['theme_logo_header_color']=='orange' ? 'checked' : '' }}>
                <span class="colorinput-color orange"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_logo_header_color" type="radio" value="red" class="colorinput-input changeLogoHeaderColor" {{ $settings['theme_logo_header_color']=='red' ? 'checked' : '' }}>
                <span class="colorinput-color red"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_logo_header_color" type="radio" value="white" class="colorinput-input changeLogoHeaderColor" {{ $settings['theme_logo_header_color']=='white' ? 'checked' : '' }}>
                <span class="colorinput-color dark-arrow white"></span>
            </label>
        </div>
        
    </div>
    <div class="row gutters-xs theme-switch-block">
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_logo_header_color" type="radio" value="dark2" class="colorinput-input changeLogoHeaderColor" {{ $settings['theme_logo_header_color']=='dark2' ? 'checked' : '' }}>
                <span class="colorinput-color dark2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_logo_header_color" type="radio" value="blue2" class="colorinput-input changeLogoHeaderColor" {{ $settings['theme_logo_header_color']=='blue2' ? 'checked' : '' }}>
                <span class="colorinput-color blue2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_logo_header_color" type="radio" value="purple2" class="colorinput-input changeLogoHeaderColor" {{ $settings['theme_logo_header_color']=='purple2' ? 'checked' : '' }}>
                <span class="colorinput-color purple2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_logo_header_color" type="radio" value="light-blue2" class="colorinput-input changeLogoHeaderColor" {{ $settings['theme_logo_header_color']=='light-blue2' ? 'checked' : '' }}>
                <span class="colorinput-color light-blue2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_logo_header_color" type="radio" value="green2" class="colorinput-input changeLogoHeaderColor" {{ $settings['theme_logo_header_color']=='green2' ? 'checked' : '' }}>
                <span class="colorinput-color green2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_logo_header_color" type="radio" value="orange2" class="colorinput-input changeLogoHeaderColor" {{ $settings['theme_logo_header_color']=='orange2' ? 'checked' : '' }}>
                <span class="colorinput-color orange2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_logo_header_color" type="radio" value="red2" class="colorinput-input changeLogoHeaderColor" {{ $settings['theme_logo_header_color']=='red2' ? 'checked' : '' }}>
                <span class="colorinput-color red2"></span>
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="form-label">{{ clean(trans('setting::settings.form.navbar_header')) }}</label>
    <div class="row gutters-xs theme-switch-block">
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_navbar_header_color" type="radio" value="dark" class="colorinput-input changeTopBarColor" {{ $settings['theme_navbar_header_color']=='dark' ? 'checked' : '' }}>
                <span class="colorinput-color dark"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_navbar_header_color" type="radio" value="blue" class="colorinput-input changeTopBarColor" {{ $settings['theme_navbar_header_color']=='blue' ? 'checked' : '' }}>
                <span class="colorinput-color blue"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_navbar_header_color" type="radio" value="purple" class="colorinput-input changeTopBarColor" {{ $settings['theme_navbar_header_color']=='purple' ? 'checked' : '' }}>
                <span class="colorinput-color purple"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_navbar_header_color" type="radio" value="light-blue" class="colorinput-input changeTopBarColor" {{ $settings['theme_navbar_header_color']=='light-blue' ? 'checked' : '' }}>
                <span class="colorinput-color light-blue"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_navbar_header_color" type="radio" value="green" class="colorinput-input changeTopBarColor" {{ $settings['theme_navbar_header_color']=='green' ? 'checked' : '' }}>
                <span class="colorinput-color green"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_navbar_header_color" type="radio" value="orange" class="colorinput-input changeTopBarColor" {{ $settings['theme_navbar_header_color']=='orange' ? 'checked' : '' }}>
                <span class="colorinput-color orange"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_navbar_header_color" type="radio" value="red" class="colorinput-input changeTopBarColor" {{ $settings['theme_navbar_header_color']=='red' ? 'checked' : '' }}>
                <span class="colorinput-color red"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_navbar_header_color" type="radio" value="white" class="colorinput-input changeTopBarColor" {{ $settings['theme_navbar_header_color']=='white' ? 'checked' : '' }}>
                <span class="colorinput-color dark-arrow white"></span>
            </label>
        </div>
        
    </div>
    <div class="row gutters-xs theme-switch-block">
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_navbar_header_color" type="radio" value="dark2" class="colorinput-input changeTopBarColor" {{ $settings['theme_navbar_header_color']=='dark2' ? 'checked' : '' }}>
                <span class="colorinput-color dark2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_navbar_header_color" type="radio" value="blue2" class="colorinput-input changeTopBarColor" {{ $settings['theme_navbar_header_color']=='blue2' ? 'checked' : '' }}>
                <span class="colorinput-color blue2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_navbar_header_color" type="radio" value="purple2" class="colorinput-input changeTopBarColor" {{ $settings['theme_navbar_header_color']=='purple2' ? 'checked' : '' }}>
                <span class="colorinput-color purple2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_navbar_header_color" type="radio" value="light-blue2" class="colorinput-input changeTopBarColor" {{ $settings['theme_navbar_header_color']=='light-blue2' ? 'checked' : '' }}>
                <span class="colorinput-color light-blue2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_navbar_header_color" type="radio" value="green2" class="colorinput-input changeTopBarColor" {{ $settings['theme_navbar_header_color']=='green2' ? 'checked' : '' }}>
                <span class="colorinput-color green2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_navbar_header_color" type="radio" value="orange2" class="colorinput-input changeTopBarColor" {{ $settings['theme_navbar_header_color']=='orange2' ? 'checked' : '' }}>
                <span class="colorinput-color orange2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_navbar_header_color" type="radio" value="red2" class="colorinput-input changeTopBarColor" {{ $settings['theme_navbar_header_color']=='red2' ? 'checked' : '' }}>
                <span class="colorinput-color red2"></span>
            </label>
        </div>
    </div>

</div>
<div class="form-group">
    <label class="form-label">{{ clean(trans('setting::settings.form.sidebar')) }}</label>
    <div class="row gutters-xs theme-switch-block">
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_sidebar_color" type="radio" value="dark" class="colorinput-input changeSideBarColor" {{ $settings['theme_sidebar_color']=='dark' ? 'checked' : '' }}>
                <span class="colorinput-color dark"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_sidebar_color" type="radio" value="blue" class="colorinput-input changeSideBarColor" {{ $settings['theme_sidebar_color']=='blue' ? 'checked' : '' }}>
                <span class="colorinput-color blue"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_sidebar_color" type="radio" value="purple" class="colorinput-input changeSideBarColor" {{ $settings['theme_sidebar_color']=='purple' ? 'checked' : '' }}>
                <span class="colorinput-color purple"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_sidebar_color" type="radio" value="light-blue" class="colorinput-input changeSideBarColor" {{ $settings['theme_sidebar_color']=='light-blue' ? 'checked' : '' }}>
                <span class="colorinput-color light-blue"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_sidebar_color" type="radio" value="green" class="colorinput-input changeSideBarColor" {{ $settings['theme_sidebar_color']=='green' ? 'checked' : '' }}>
                <span class="colorinput-color green"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_sidebar_color" type="radio" value="orange" class="colorinput-input changeSideBarColor" {{ $settings['theme_sidebar_color']=='orange' ? 'checked' : '' }}>
                <span class="colorinput-color orange"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_sidebar_color" type="radio" value="red" class="colorinput-input changeSideBarColor" {{ $settings['theme_sidebar_color']=='red' ? 'checked' : '' }}>
                <span class="colorinput-color red"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_sidebar_color" type="radio" value="white" class="colorinput-input changeSideBarColor" {{ $settings['theme_sidebar_color']=='white' ? 'checked' : '' }}>
                <span class="colorinput-color dark-arrow white"></span>
            </label>
        </div>
        
    </div>
    <div class="row gutters-xs theme-switch-block">
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_sidebar_color" type="radio" value="dark2" class="colorinput-input changeSideBarColor" {{ $settings['theme_sidebar_color']=='dark2' ? 'checked' : '' }}>
                <span class="colorinput-color dark2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_sidebar_color" type="radio" value="blue2" class="colorinput-input changeSideBarColor" {{ $settings['theme_sidebar_color']=='blue2' ? 'checked' : '' }}>
                <span class="colorinput-color blue2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_sidebar_color" type="radio" value="purple2" class="colorinput-input changeSideBarColor" {{ $settings['theme_sidebar_color']=='purple2' ? 'checked' : '' }}>
                <span class="colorinput-color purple2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_sidebar_color" type="radio" value="light-blue2" class="colorinput-input changeSideBarColor" {{ $settings['theme_sidebar_color']=='light-blue2' ? 'checked' : '' }}>
                <span class="colorinput-color light-blue2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_sidebar_color" type="radio" value="green2" class="colorinput-input changeSideBarColor" {{ $settings['theme_sidebar_color']=='green2' ? 'checked' : '' }}>
                <span class="colorinput-color green2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_sidebar_color" type="radio" value="orange2" class="colorinput-input changeSideBarColor" {{ $settings['theme_sidebar_color']=='orange2' ? 'checked' : '' }}>
                <span class="colorinput-color orange2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_sidebar_color" type="radio" value="red2" class="colorinput-input changeSideBarColor" {{ $settings['theme_sidebar_color']=='red2' ? 'checked' : '' }}>
                <span class="colorinput-color red2"></span>
            </label>
        </div>
    </div>

</div>
<div class="form-group">
    <label class="form-label">{{ clean(trans('setting::settings.form.background')) }}</label>
    <div class="row gutters-xs theme-switch-block">
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_background_color" type="radio" value="bg1" class="colorinput-input changeBackgroundColor" {{ $settings['theme_background_color']=='bg1' ? 'checked' : '' }}>
                <span class="colorinput-color dark-arrow bg1"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_background_color" type="radio" value="bg2" class="colorinput-input changeBackgroundColor" {{ $settings['theme_background_color']=='bg2' ? 'checked' : '' }}>
                <span class="colorinput-color dark-arrow bg2"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_background_color" type="radio" value="bg3" class="colorinput-input changeBackgroundColor" {{ $settings['theme_background_color']=='bg3' ? 'checked' : '' }}>
                <span class="colorinput-color dark-arrow bg3"></span>
            </label>
        </div>
        <div class="col-auto">
            <label class="colorinput">
                <input name="theme_background_color" type="radio" value="dark" class="colorinput-input changeBackgroundColor" {{ $settings['theme_background_color']=='dark' ? 'checked' : '' }}>
                <span class="colorinput-color dark"></span>
            </label>
        </div>
        
    </div>
</div>