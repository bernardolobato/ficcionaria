import { Component, OnInit } from '@angular/core';
import { PostService } from '../../../services/post.service';
import { Post } from '../../../model/post';
import { ActivatedRoute } from '@angular/router';
@Component({
  selector: 'app-view-post',
  templateUrl: './view-post.component.html',
  styleUrls: ['./view-post.component.css']
})
export class ViewPostComponent implements OnInit {
  private post;
  constructor(private service: PostService, private activatedRoute: ActivatedRoute) {
    this.post = new Post();
  }

  ngOnInit() {
    this.getParams()
    .concatMap((params) => this.getPost(params.id))
    .subscribe((post)=>this.post = post);
  }

  private getPost(id) {
    return this.service.get(id);
  }

  private getParams() {
    return this.activatedRoute.params;
  }

}
