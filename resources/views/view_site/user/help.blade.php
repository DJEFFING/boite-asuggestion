@extends('view_site.partials.app')
@section('content')
<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Question posé fréquemment</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="/">Acceuil</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											FAQ
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="faq-wrap">
						<h4 class="mb-20 h4 text-blue">Quelques exemples</h4>
						<div id="accordion">
							<div class="card">
								<div class="card-header">
									<button
										class="btn btn-block"
										data-toggle="collapse"
										data-target="#faq1"
									>
										Comment créer un compte utilisateur ? 
									</button>
								</div>
								<div id="faq1" class="collapse show" data-parent="#accordion">
									<div class="card-body">
										pour crée un compte utilisateur l’utilisateur dois 
       									juste ajouter un pseudo et un mot de passe et une confirmation de mots de passe. Si 
       									un compte existe l’application dois retourner une erreur à cet utilisateur-là qui essais 
       									de crée un compte. Si tous est en règle et que la création du compte de l’utilisateur 
       									est valider, celui-ci dois être automatiquement connecté et rediriger vers la page 
       									d’accueil.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<button
										class="btn btn-block collapsed"
										data-toggle="collapse"
										data-target="#faq2"
									>
										Comment se passe la connexion ? 
									</button>
								</div>
								<div id="faq2" class="collapse" data-parent="#accordion">
									<div class="card-body">
										Pour se connecter, l’utilisateur dois juste ajouter entrer un nom 
										d’utilisateur valide et un mot de passe valide. Si les informations qui sont entré par 
										l’utilisateur ne sont pas valides, l’application doit lui retourner un message d’erreur. 
										Si tous est valide, l’utilisateur sera redirigé vers la page d’accueil de la page
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<button
										class="btn btn-block collapsed"
										data-toggle="collapse"
										data-target="#faq3"
									>
										es-ce que la suppression de mon compte entrainera la suppression de mes suggestion ? 
									</button>
								</div>
								<div id="faq3" class="collapse" data-parent="#accordion">
									<div class="card-body">
										<p>
										Un utilisateur à la possibilité de supprimer son compte. La 
										suppression de son compte ne doit entrainer en aucun cas la suppression de ses 
										suggestions. Mais elle pourra entrainer la suppression de toutes ces notifications.
										</p>
					
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<button
										class="btn btn-block collapsed"
										data-toggle="collapse"
										data-target="#faq4"
									>
										Comment créer une suggestion ?
									</button>
								</div>
								<div id="faq4" class="collapse" data-parent="#accordion">
									<div class="card-body">
										Avant d’écrire une suggestion l’utilisateur dois d’abord 
                        				dire si ça suggestion est priver ou public. les suggestions peuvent être crée par les 
                        				utilisateurs mais avant d’entre valider, ils doivent être modéré, si le contenue de la 
                        				notification n’est pas bon et ou n’est constructif, la suggestion ne sera pas valider. Et 
                        				l’utilisateur sera invité à ressayer. Si toute est en règle la suggestion sera privé ou 
                        				public celons le choix de l’utilisateur.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<button
										class="btn btn-block collapsed"
										data-toggle="collapse"
										data-target="#faq5"
									>
										Est il possible de supprimer une suggestion ? 
									</button>
								</div>
								<div id="faq5" class="collapse" data-parent="#accordion">
									<div class="card-body">
										NON, cette opération est reverver qu'aux administrateurs. 
										Mais après 6 mois les suggestions non approuvé par l'adminitrateur 
										seront automatiquement supprimer.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<button
										class="btn btn-block collapsed"
										data-toggle="collapse"
										data-target="#faq6"
									>
										Est il possible de rechercher une suggestion ? 
									</button>
								</div>
								<div id="faq6" class="collapse" data-parent="#accordion">
									<div class="card-body">
										<p>
											Oui, il sera également possible de regrouper les suggestions 
											en fonction de leurs statuts.IL sera aussi possible de 
											regrouper les suggestions en fonction de leurs statuts.
									
										</p>
										
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<button
										class="btn btn-block collapsed"
										data-toggle="collapse"
										data-target="#faq6"
									>
										EST il possible d'ajouter un commentaire à une suggestion ? 
									</button>
								</div>
								<div id="faq6" class="collapse" data-parent="#accordion">
									<div class="card-body">
										<p>
											Oui, un utilisateur à la possibilité d’ajouter un commentaire à 
											une suggestion. Il peut ajouter autant de commentaire qu’il le souhaite. Les 
											commentaires doivent être également modérés pour n’avoir que des commentaires 
											constructifs.Et même egalement de liké une suggestion.                        				
									
										</p>
										
									</div>
								</div>
							</div>
						</div>
						
				</div>
				
			</div>
		</div>
@endsection