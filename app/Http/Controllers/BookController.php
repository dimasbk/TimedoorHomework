<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookPostRequest;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Book;
use PHPUnit\TextUI\Configuration\Builder;

class BookController extends Controller
{
    private $books = [
        ["id" => 1, "image" => 'https://covers.openlibrary.org/b/olid/OL27213498M-M.jpg', "title" => "It Ends With Us", "short_desc" => "Lily hasn't always had it easy, but that's never stopped her from working hard for the life she wants. She's come a long way from the small town where she grew up—she graduated from college, moved to Boston, and started her own business. And when she feels a spark with a gorgeous neurosurgeon named Ryle Kincaid, everything in Lily's life seems too good to be true."],
        ["id" => 2, "image" => 'https://covers.openlibrary.org/b/olid/OL25418275M-M.jpg', "title" => "The 48 Laws of Power", "short_desc" => "Amoral, cunning, ruthless, and instructive, this piercing work distills three thousand years of the history of power in to forty-eight well explicated laws. As attention--grabbing in its design as it is in its content, this bold volume outlines the laws of power in their unvarnished essence, synthesizing the philosophies of Machiavelli, Sun-tzu, Carl von Clausewitz, and other great thinkers."],
        ["id" => 3, "image" => 'https://covers.openlibrary.org/b/olid/OL28230579M-M.jpg', "title" => "The Subtle Art of Not Giving a Fuck", "short_desc" => "This breakout, mega bestseller is the self-help book for people who hate self-help. It’s as much a pat on the back as a slap in the face. It’s the first truly no BS guide to flourishing in a crazy, crazy world—a truly counterintuitive approach to living a good life."],
        ["id" => 4, "image" => 'https://covers.openlibrary.org/b/olid/OL16980586M-M.jpg', "title" => "Rich Dad Poor Dad", "short_desc" => "It's been nearly 25 years since Robert Kiyosaki’s Rich Dad Poor Dad first made waves in the Personal Finance arena. It has since become the #1 Personal Finance book of all time... translated into dozens of languages and sold around the world."],
        ["id" => 5, "image" => 'https://covers.openlibrary.org/b/id/12749873-M.jpg', "title" => "It Starts With Us", "short_desc" => "Before It Ends with Us, it started with Atlas. Colleen Hoover tells fan favorite Atlas’s side of the story and shares what comes next in this long-anticipated sequel to the “glorious and touching” (USA TODAY) #1 New York Times bestseller It Ends with Us."],
        ["id" => 6, "image" => 'https://covers.openlibrary.org/b/olid/OL26992991M-M.jpg', "title" => "A Court of Mist and Fury", "short_desc" => "Feyre has undergone more trials than one human woman can carry in her heart. Though she's now been granted the powers and lifespan of the High Fae, she is haunted by her time Under the Mountain and the terrible deeds she performed to save the lives of Tamlin and his people."],
        ["id" => 7, "image" => 'https://covers.openlibrary.org/b/olid/OL22856696M-M.jpg', "title" => "Harry Potter and the Sorcerer's Stone", "short_desc" => "Till now there's been no magic for Harry Potter. He lives with the miserable Dursleys and their abominable son, Dudley. Harry's room is a tiny closet beneath the stairs, and he hasn't had a birthday party in eleven years."],
        ["id" => 8, "image" => 'https://covers.openlibrary.org/b/id/13180424-M.jpg', "title" => "Twisted Love", "short_desc" => "He has a heart of ice … but for her, he'd burn the world. Alex Volkov is a devil blessed with the face of an angel and cursed with a past he can't escape. Driven by a tragedy that has haunted him for most of his life, his ruthless pursuits for success and vengeance leave little room for matters of the heart."],
        ["id" => 9, "image" => 'https://covers.openlibrary.org/b/olid/OL27918581M-M.jpg', "title" => "Atomic Habits", "short_desc" => "No matter your goals, Atomic Habits offers a proven framework for improving every day."],
        ["id" => 10, "image" => 'https://covers.openlibrary.org/b/id/10389354-M.jpg', "title" => "The Psychology of Money", "short_desc" => "Timeless lessons on wealth, greed, and happiness doing well with money isn’t necessarily about what you know. It’s about how you behave. And behavior is hard to teach, even to really smart people."],
        ["id" => 11, "image" => 'https://covers.openlibrary.org/b/olid/OL29191495M-M.jpg', "title" => "Ugly Love", "short_desc" => "ATTRACTION AT FIRST SIGHT CAN BE MESSY… When Tate Collins finds airline pilot Miles Archer passed out in front of her apartment door, it is definitely not love at first sight."],
        ["id" => 12, "image" => 'https://covers.openlibrary.org/b/olid/OL26425330M-M.jpg', "title" => "A Game of Thrones", "short_desc" => "A Game of Thrones is the first novel in A Song of Ice and Fire, a series of fantasy novels by the American author George R. R. Martin. It was first published on August 1, 1996."],
    ];

    private $bookDetails = [
        [
            'id' => 1,
            'isbn' => "1471156265",
            'title' => "It Ends With Us",
            'author' => "Colleen Hoover",
            'image' => "https://covers.openlibrary.org/b/olid/OL27213498M-M.jpg",
            'publisher' => "Simon & Schuster Ltd",
            'category' => "Novel",
            'pages' => "384",
            'language' => "Portuguese",
            'publish_date' => "2016-08-02",
            'subjects' => ["Fiction", "Romance", "Contemporary"],
            'desc' => "Lily hasn’t always had it easy, but that’s never stopped her from working hard for the life she wants. She’s come a long way from the small town where she grew up—she graduated from college, moved to Boston, and started her own business. And when she feels a spark with a gorgeous neurosurgeon named Ryle Kincaid, everything in Lily’s life seems too good to be true.
    Ryle is assertive, stubborn, maybe even a little arrogant. He’s also sensitive, brilliant, and has a total soft spot for Lily. And the way he looks in scrubs certainly doesn’t hurt. Lily can’t get him out of her head. But Ryle’s complete aversion to relationships is disturbing. Even as Lily finds herself becoming the exception to his 'no dating' rule, she can’t help but wonder what made him that way in the first place.
    As questions about her new relationship overwhelm her, so do thoughts of Atlas Corrigan—her first love and a link to the past she left behind. He was her kindred spirit, her protector. When Atlas suddenly reappears, everything Lily has built with Ryle is threatened.
    With this bold and deeply personal novel, It Ends With Us is a heart-wrenching story and an unforgettable tale of love that comes at the ultimate price."
        ],
        [
            'id' => 2,
            'isbn' => "1471156265",
            'title' => "It Ends With You",
            'author' => "Colleen Hoover",
            'image' => "https://covers.openlibrary.org/b/olid/OL27213498M-M.jpg",
            'publisher' => "Simon & Schuster Ltd",
            'category' => "Novel",
            'pages' => "384",
            'language' => "Portuguese",
            'publish_date' => "2016-08-02",
            'subjects' => ["Fiction", "Romance", "Contemporary"],
            'desc' => "Lily hasn’t always had it easy, but that’s never stopped her from working hard for the life she wants. She’s come a long way from the small town where she grew up—she graduated from college, moved to Boston, and started her own business. And when she feels a spark with a gorgeous neurosurgeon named Ryle Kincaid, everything in Lily’s life seems too good to be true.
Ryle is assertive, stubborn, maybe even a little arrogant. He’s also sensitive, brilliant, and has a total soft spot for Lily. And the way he looks in scrubs certainly doesn’t hurt. Lily can’t get him out of her head. But Ryle’s complete aversion to relationships is disturbing. Even as Lily finds herself becoming the exception to his 'no dating' rule, she can’t help but wonder what made him that way in the first place.
As questions about her new relationship overwhelm her, so do thoughts of Atlas Corrigan—her first love and a link to the past she left behind. He was her kindred spirit, her protector. When Atlas suddenly reappears, everything Lily has built with Ryle is threatened.
With this bold and deeply personal novel, It Ends With Us is a heart-wrenching story and an unforgettable tale of love that comes at the ultimate price."
        ]
    ];

    public function index(Request $request)
    {
        //dd($request->search);
        if ($request->has('search')) {
            $keyword = $request->search;
            //dd($keyword);

            $books = Book::where('isbn', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->whereHas('author', function (\Illuminate\Database\Eloquent\Builder $query) {
                    $query->where('name', 'LIKE', 'code%');
                })
                ->orWhere('publisher', 'LIKE', "%$keyword%")
                ->orWhere('category', 'LIKE', "%$keyword%")
                ->orWhere('subjects', 'LIKE', "%$keyword%")
                ->orWhere('desc', 'LIKE', "%$keyword%")->paginate(10)->withQueryString();
            ;
        } else {
            $books = Book::paginate(10);
        }
        //dd($request->search);
        return view('index', compact(['books']));
    }

    public function create()
    {
        return view('createForm');
    }

    public function store(BookPostRequest $request)
    {
        //dd($request);
        $validated = $request->validated();

        $book = Book::create($validated);

        return redirect()->route('books.index')->with('status', 'Data Created Succesfully');
    }

    public function show($id)
    {
        $bookDetail = Book::with('author')->where('id', $id)->first();

        return view('detail', compact('bookDetail'));
    }

    public function edit($id, Book $book)
    {
        if (!Gate::allows('update-delete-book', $book)) {
            abort(403);
        }

        $bookDetail = Book::where('id', $id)->first();
        //dd($bookDetail);
        return view('edit', compact(['bookDetail']));
    }

    public function update(BookPostRequest $request, Book $book)
    {
        if (!Gate::allows('update-delete-book', $book)) {
            abort(403);
        }
        //dd($request);
        $validated = $request->validated();

        $book = Book::find($request->id)->update($validated);

        return redirect()->route('books.index')->with('status', 'Data Updated Succesfully');
    }

    public function delete($id, Book $book)
    {
        if (!Gate::allows('update-delete-book', $book)) {
            abort(403);
        }

        $book = Book::find($id)->delete();

        return redirect()->route('books.index')->with('deleted', 'Data Deleted Succesfully');
    }


}