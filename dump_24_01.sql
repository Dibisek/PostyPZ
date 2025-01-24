--
-- PostgreSQL database dump
--

-- Dumped from database version 17.2 (Debian 17.2-1.pgdg120+1)
-- Dumped by pg_dump version 17.2 (Debian 17.2-1.pgdg120+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: set_log_date(); Type: FUNCTION; Schema: public; Owner: docker
--

CREATE FUNCTION public.set_log_date() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
    NEW.log_date := CURRENT_DATE;
    RETURN NEW;
END;
$$;


ALTER FUNCTION public.set_log_date() OWNER TO docker;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: bookmarks; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.bookmarks (
    id_user character varying(30) NOT NULL,
    id_post character varying(30) NOT NULL
);


ALTER TABLE public.bookmarks OWNER TO docker;

--
-- Name: logs; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.logs (
    id_user character varying(30),
    log_date date
);


ALTER TABLE public.logs OWNER TO docker;

--
-- Name: posts; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.posts (
    id_post character varying(30) NOT NULL,
    id_user_owner character varying(30) NOT NULL,
    title character varying(255) NOT NULL,
    description text NOT NULL,
    image character varying(255) NOT NULL,
    created_at character varying(20) NOT NULL,
    "like" integer DEFAULT 0 NOT NULL,
    dislike integer DEFAULT 0 NOT NULL
);


ALTER TABLE public.posts OWNER TO docker;

--
-- Name: rating; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.rating (
    id_user character varying(30) NOT NULL,
    id_post character varying(30) NOT NULL,
    score integer NOT NULL,
    CONSTRAINT rating_score_check CHECK (((score >= '-1'::integer) AND (score <= 1)))
);


ALTER TABLE public.rating OWNER TO docker;

--
-- Name: roles; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.roles (
    id_role integer NOT NULL,
    role_desc character varying(20) NOT NULL
);


ALTER TABLE public.roles OWNER TO docker;

--
-- Name: users; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.users (
    id_user character varying(30) NOT NULL,
    id_role integer DEFAULT 1 NOT NULL,
    email character varying(100) NOT NULL,
    password character varying(100) NOT NULL,
    username character varying(50) NOT NULL
);


ALTER TABLE public.users OWNER TO docker;

--
-- Data for Name: bookmarks; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.bookmarks (id_user, id_post) FROM stdin;
\.


--
-- Data for Name: logs; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.logs (id_user, log_date) FROM stdin;
6793dbcdea8f27.29313160	2025-01-24
6793dbcdea8f27.29313160	2025-01-24
6793dbcdea8f27.29313160	2025-01-24
6793dbcdea8f27.29313160	2025-01-24
\.


--
-- Data for Name: posts; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.posts (id_post, id_user_owner, title, description, image, created_at, "like", dislike) FROM stdin;
6793e105e4e911.24520249	6793dbcdea8f27.29313160	test	test	6793e105df0e28.63052595.png	24-01-2025	0	0
6793e36f7fe992.84935094	6793dbcdea8f27.29313160	test	test	6793e36f7a6317.79943161.png	24-01-2025	0	0
6793e3ad91a228.78047028	6793dbcdea8f27.29313160	fuck	u	6793e3ad8c2ac5.93058606.png	24-01-2025	0	0
6793eb82e81120.16358119	6793dbcdea8f27.29313160	FUCK	:)	6793eb82e5a789.11308330.png	24-01-2025	0	0
6793ebb38deb10.28998149	6793dbcdea8f27.29313160	tsefsdf	dfsf	6793ebb3892413.28348363.png	24-01-2025	0	0
6793ebc5529320.00984498	6793dbcdea8f27.29313160	tsefsdf	dfsf	6793ebc54e2773.33752607.png	24-01-2025	0	0
6793ec273a8bc7.47279387	6793dbcdea8f27.29313160	FUCK	scasda	6793ec27371432.94010453.png	24-01-2025	0	0
6793ec7a4cede7.26606283	6793dbcdea8f27.29313160	FUCK	scasda	6793ec7a486ca4.35088195.png	24-01-2025	0	0
6793eca412fe79.38057465	6793dbcdea8f27.29313160	FUCK	scasda	6793eca40fbd38.39420358.png	24-01-2025	0	0
6793ecccc9c407.01175180	6793dbcdea8f27.29313160	jklas;d;;d;d;d;d;d;d;	f'dsg/\r\n,gdfgv\r\ndflsdfk;sldkf	6793ecccc4b5e4.96210063.png	24-01-2025	0	0
\.


--
-- Data for Name: rating; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.rating (id_user, id_post, score) FROM stdin;
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.roles (id_role, role_desc) FROM stdin;
2	Admin
1	User
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.users (id_user, id_role, email, password, username) FROM stdin;
6793dbcdea8f27.29313160	1	test@test123.pl	$2y$10$vZ0X5XeB4CPo.JGm959LvuBFpqnHgvtd6Icf5hMNoMIuXHEl2NkOq	test
\.


--
-- Name: posts posts_pkey; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_pkey PRIMARY KEY (id_post);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id_role);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id_user);


--
-- Name: logs before_insert_logs; Type: TRIGGER; Schema: public; Owner: docker
--

CREATE TRIGGER before_insert_logs BEFORE INSERT ON public.logs FOR EACH ROW EXECUTE FUNCTION public.set_log_date();


--
-- Name: bookmarks bookmarks_id_post_fkey; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.bookmarks
    ADD CONSTRAINT bookmarks_id_post_fkey FOREIGN KEY (id_post) REFERENCES public.posts(id_post) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: bookmarks bookmarks_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.bookmarks
    ADD CONSTRAINT bookmarks_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: posts posts_id_user_owner_fkey; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_id_user_owner_fkey FOREIGN KEY (id_user_owner) REFERENCES public.users(id_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: rating rating_id_post_fkey; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.rating
    ADD CONSTRAINT rating_id_post_fkey FOREIGN KEY (id_post) REFERENCES public.posts(id_post) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: rating rating_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.rating
    ADD CONSTRAINT rating_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: users users_id_role_fkey; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_id_role_fkey FOREIGN KEY (id_role) REFERENCES public.roles(id_role) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

