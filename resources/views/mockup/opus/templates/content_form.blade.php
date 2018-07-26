<section class="content-form">
    <div class="row">
        <div class="col col-left">
            <div class="warp-content">
                <div class="content1">
                    <h2 class="h2 title">{{$data['template_name']}}</h2>
                    <p>{{$data['detail']}}</p>
                    <p>{{$data['detail']}}</p>
                </div>

                <div class="content2">
                    <h2 class="h4 title">{{$data['content_hr']}}</h2>
                    <p class="detail display-date time">Open Daily time 10:00-23:00</p>
                    <p class="detail display-date">Phone :
                        <span> XX 255 8787</span>
                    </p>
                    <p class="detail display-date">Email :
                        <span>info@opus.co.vn</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="col col-right">
            <div class="warp-form">

                <h2 class="title">{{$data['template_name']}}</h2>
                <div class="form-input">
                    <input type="email" value="" placeholder="Your name *" required />
                    <input type="email" value="" placeholder="Email *" required />
                    <input type="email" value="" placeholder="Phone" required />
                </div>
                <div class="dropdown-input h4">

                    <select class="person ">
                        <option value="hide">Person</option>
                        <option value="january">1</option>
                        <option value="february">2</option>
                        <option value="march">3</option>
                        <option value="april">4</option>
                        <option value="may">5</option>
                        <option value="june">6</option>
                        <option value="july">7</option>
                        <option value="august">8</option>
                        <option value="september">9</option>
                        <option value="october">10</option>
                        <option value="november">11</option>
                        <option value="december">12</option>
                    </select>
                    <div class="datepick">
                        <input type="text" class="date-piacker js-date-picker" name="booking-check-in">
                        <!-- <div class="icon-cheveron-down"></div> -->
                    </div>

                    <select class="time">
                        <option value="hide">time</option>
                        <option value="january">1</option>
                        <option value="february">2</option>
                        <option value="march">3</option>
                        <option value="april">4</option>
                    </select>

                </div>
                <div class="specail-request">
                    <h4 class="describe display-date">{{$data['template_name']}}</h4>
                    <textarea placeholder="" rows="20" name="comment[text]" id="comment_text" cols="40" class="ui-autocomplete-input" autocomplete="off"
                        role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>
                </div>
                <div class="checkbox">
                    <div class="formcheck formcheck_checkbox">
                        <label for="checkbox-one">
                            <input id="checkbox-one" type="checkbox">
                            <div class="formcheck__input"></div>
                            <span class=" formcheck__label display-date">{{$data['template_name']}}</span>
                        </label>
                    </div>
                </div>
                <button>
                    <a href="#" class="h5 btn-primary">submit</a>
                </button>
            </div>
        </div>
    </div>

</section>