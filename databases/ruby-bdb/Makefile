# Created by: Akinori MUSHA aka knu <knu@idaemons.org>
# $FreeBSD$

PORTNAME=	bdb
PORTVERSION=	0.6.6
PORTREVISION=	4
CATEGORIES=	databases ruby
MASTER_SITES=	ftp://ftp.idaemons.org/pub/distfiles/ruby/ \
		http://idaemons.org/distfiles/ruby/ \
		LOCAL/knu
PKGNAMEPREFIX=	${RUBY_PKGNAMEPREFIX}
PKGNAMESUFFIX=	${WITH_BDB_VER}
DIST_SUBDIR=	ruby

MAINTAINER=	knu@FreeBSD.org
COMMENT=	Ruby interface to Oracle Berkeley DB revision 2 or later

LICENSE=	RUBY

USE_BDB=	yes

OPTIONS_DEFINE=	DOCS EXAMPLES

USE_RUBY=		yes
USE_RUBY_EXTCONF=	yes
USE_RUBY_RDOC=		yes

CONFIGURE_ARGS=	--with-db-include=${BDB_INCLUDE_DIR} \
		--with-db-lib=${BDB_LIB_DIR}
INSTALL_TARGET=	site-install

DOCS=		Changes README.en bdb.rd docs/*.rd
DOCSDIR=	${RUBY_MODDOCDIR}
EXAMPLESDIR=	${RUBY_MODEXAMPLESDIR}
PLIST_FILES=	%%RUBY_SITEARCHLIBDIR%%/bdb.so
PORTDOCS=	*
PORTEXAMPLES=	*
USES=		shebangfix tar:bzip2
SHEBANG_FILES=	examples/record.rb \
		examples/recno.rb \
		examples/zeroc.rb \
		examples/txn.rb \
		examples/queue.rb \
		examples/cats.rb \
		examples/log.rb \
		examples/cursor.rb \
		examples/func.rb \
		examples/replication/mgr/b.rb \
		examples/replication/base/op.rb \
		examples/replication/base/cl.rb \
		examples/replication/base/b.rb \
		examples/replication/base/ma.rb \
		examples/replication/base/mc.rb \
		examples/join.rb \
		examples/basic.rb \
		examples/lock.rb

.include <bsd.port.pre.mk>

.if ${RUBY_VER} >= 2.0
EXTRA_PATCHES+=		${FILESDIR}/extra-patch-src-features.rb
.endif

.if ${RUBY_VER} >= 2.1
EXTRA_PATCHES+=		${FILESDIR}/extra-patch-bdbxml2-bdbxml.h
.endif

.if ${RUBY_VER} == 2.1
EXTRA_PATCHES+=		${FILESDIR}/extra-patch-src-common.c-21
.endif

.if ${RUBY_VER} == 2.2
EXTRA_PATCHES+=		${FILESDIR}/extra-patch-src-common.c-22 \
			${FILESDIR}/extra-patch-src-recnum.c-22 \
			${FILESDIR}/extra-patch-src-cursor.c-22
.endif

post-build:
	(cd ${BUILD_WRKSRC} && ${SETENV} ${MAKE_ENV} ${MAKE} \
	${MAKE_FLAGS} ${MAKEFILE} ${MAKE_ARGS} rdoc)

post-install:
	${STRIP_CMD} ${STAGEDIR}${RUBY_SITEARCHLIBDIR}/bdb.so
	${MKDIR} ${STAGEDIR}${DOCSDIR}/doc
	(cd ${WRKSRC} && ${INSTALL_DATA} ${DOCS} ${STAGEDIR}${DOCSDIR})
	(cd ${WRKSRC}/docs/doc && ${COPYTREE_SHARE} . ${STAGEDIR}${DOCSDIR}/doc)
	${MKDIR} ${STAGEDIR}${EXAMPLESDIR}/
	(cd ${WRKSRC}/examples/ && ${COPYTREE_SHARE} . ${STAGEDIR}${EXAMPLESDIR} "! -empty")

regression-test: build
	@${MKDIR} ${BUILD_WRKSRC}/tmp
	(cd ${BUILD_WRKSRC} && ${SETENV} ${MAKE_ENV} ${MAKE} \
	${MAKE_FLAGS} ${MAKEFILE} ${MAKE_ARGS} test)

.include <bsd.port.post.mk>
