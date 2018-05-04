import { Component, OnInit } from '@angular/core';
import { PostService } from '../../services/post.service';
import { Observable } from 'rxjs';
import { ListPostComponent } from '../../components/post/list-post/list-post.component';
@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  posts;

  constructor(private service: PostService) { }

  ngOnInit() {
   this.service.list().subscribe((posts) => {
     this.posts = posts;
   });
  }

}
