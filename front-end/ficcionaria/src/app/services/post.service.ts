import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { Post } from '../model/post';
import { Http, Headers, Response } from '@angular/http';
import 'rxjs/Rx';

@Injectable()
export class PostService {

  constructor(private http: Http) {
  }

  public list() {
    return this.http.get('http://api-ficcionaria/posts').map((res) => {
        const postsResponse = res.json();
        let posts = [];
        console.log(postsResponse);
        postsResponse.forEach(element => {
          const p = this.convertResponseToPost(element);
          posts.push(p);
        });
        console.log(posts);
        return posts;
      }).catch((erro) => Observable.throw(erro.json().errors));
  }

  public get(id) {
    return this.http.get('http://api-ficcionaria/posts/'+id).map((res) => {
        const postsResponse = res.json();
        const post = this.convertResponseToPost(postsResponse);
        return post;
      }).catch((erro) => Observable.throw(erro.json().errors));
  }

  public save(post) {
    if (post.id) {
      return this.http.put('http://api-ficcionaria/posts', post).map((res) => {
        const postsResponse = res.json();
        const post = this.convertResponseToPost(postsResponse);
        return post;
      }).catch((erro) => Observable.throw(erro.json().errors));
    } else {
      return this.http.post('http://api-ficcionaria/posts', post).map((res) => {
        /*const postsResponse = res.json();
        const post = this.convertResponseToPost(postsResponse);
        return post;*/
      }).catch((erro) => Observable.throw(erro.json().errors));
    }
  }

  private convertResponseToPost(element) {
    let p = new Post();
    p.id = element.id;
    p.profile = element.profile;
    p.status = element.status;
    p.text = element.text;
    p.teaser = element.teaser;
    p.title = element.title;
    p.created = element.created;
    p.modified = element.modified;
    p.postedAt = element.postedAt;
    return p;
  }

}
