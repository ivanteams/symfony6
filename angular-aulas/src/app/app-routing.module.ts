import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AulaListComponent } from './components/aula-list/aula-list.component';

const routes: Routes = [
  { path: '/verAulas', component: AulaListComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
