import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { SavePostComponent } from './components/post/save-post/save-post.component';


const routes: Routes = [
  {path: 'save-post', component: SavePostComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}

export const routingComponents = RouterModule.forRoot(routes);