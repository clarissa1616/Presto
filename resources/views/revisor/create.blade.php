<x-layouts>


    <header>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active img-fluid" style="background-image: url('https://www.tlctel.com/wordpress/wp-content/uploads/2017/07/aziendaphone.jpg')">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item img-fluid" style="background-image: url('https://www.4stars.it/blog/wp-content/uploads/2019/09/welfare.jpg')">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('https://www.dieffe.tech/wp-content/uploads/2018/11/cultura-di-apprendimento-formazione-continua.jpg')">
              <div class="carousel-caption d-none d-md-block"> 
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
        </div>
      </header>
      
        <div class="container-fluid bg-team text-center py-5 my-5">
          <h4 class=" font-weight-bold text-white ">LAVORA CON NOI</h4>
          <p class="lead text-white">Diventa revisor! Aiutaci a filtrare i contenuti adeguati al nostro pubblico</p>
        </div>
      
    <div class="container mt-5">
        <div class="row">
                    <div class="col-12 col-lg-12 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <h5 class="card-title text-center">Inviaci i tuoi dati, entra a far parte del nostro Team!</h5>
                                <form action="{{ route('revisor.store') }}" method="post">
                                    @csrf
                                    <div class="it-datepicker-wrapper">
                                        <div class="form-group col-lg-12">
                                            <label for="date">Data di nascita</label>
                                          <input class="form-control it-date-datepicker" name='date' id="date" type="date" placeholder="inserisci la data in formato gg/mm/aaaa">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                            <label for="phone">Numero di Telefono</label>
                                            <input class="form-control" type="text" id="phone" name="phone" placeholder="+39">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="address" class="form-label">Indirizzo</label>
                                        <input type="text" name="address" id="address" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="body" class="form-label">Perchè scegliere te? </label>
                                        <textarea name="body" cols="30" rows="10" class="form-control" id="body" placeholder=""></textarea>
                                    </div>
                                    {{-- <input type="hidden" name="user_id" value="{{auth()->id()}}"> --}}
                                    <button type="submit" class="btn coloresecondario text-white">Invia richiesta</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</x-layouts>
