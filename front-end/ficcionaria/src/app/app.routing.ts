import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { SavePostComponent } from './components/post/save-post/save-post.component';
import { ViewPostComponent } from './components/post/view-post/view-post.component';
import { HomeComponent } from './components/home/home.component';
import { ViewProfileComponent } from './components/profile/view-profile/view-profile.component';
import { ListProfileComponent } from './components/profile/list-profile/list-profile.component';


const routes: Routes = [
  {path: 'post/novo', component: SavePostComponent},
  {path: 'post/visualizar/:id', component: ViewPostComponent},
  {path: 'perfil/visualizar/:id', component: ViewProfileComponent},
    {path: 'list-profile', component: ListProfileComponent},

  {path: '', component: HomeComponent},

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}

export const routingComponents = RouterModule.forRoot(routes);