# $FreeBSD$

PORTNAME=	mailest
PORTVERSION=	0.9.20
DISTVERSIONPREFIX=	${PORTNAME}-
PORTREVISION=	1
CATEGORIES=	mail

MAINTAINER=	hrs@FreeBSD.org
COMMENT=	Hyper Estraier backend for Mew

LICENSE=	BSD2CLAUSE BSD3CLAUSE ISCL LGPL21
LICENSE_COMB=	multi
.for L in ${LICENSE}
LICENSE_FILE_${L}=	${WRKSRC}/LICENSE.${L}
.endfor

LIB_DEPENDS=	libevent.so:${PORTSDIR}/devel/libevent2 \
		libqdbm.so:${PORTSDIR}/databases/qdbm \
		libestraier.so:${PORTSDIR}/textproc/hyperestraier
RUN_DEPENDS=	mewl:${PORTSDIR}/mail/mew

USES=		iconv
USE_EMACS=	yes
USE_GITHUB=	yes
GH_ACCOUNT=	yasuoka
MAKE_ENV=	USE_BSDMAKE=true WITH_INSTALL_AS_USER=true

LICENSE_BSD2CLAUSE_SRC=	bytebuf.c replace/sys/tree.h
LICENSE_BSD3CLAUSE_SRC=	replace/sys/queue.h
LICENSE_ISCL_SRC=	mailestctl.c parser.c parser.h \
			replace/open_memstream.c \
			replace/reallocarray.c \
			replace/replace.h \
			replace/strlcat.c \
			replace/strtonum.c
LICENSE_LGPL21_SRC=	estdraft.c
LICENSE_BSD2CLAUSE_REGEX="/ \* [Cc]opyright/,/ \*\//!d;s,^ \*,,;s,^/,,"
LICENSE_BSD3CLAUSE_REGEX=${LICENSE_BSD2CLAUSE_REGEX}
LICENSE_ISCL_REGEX=	${LICENSE_BSD2CLAUSE_REGEX}
LICENSE_LGPL21_REGEX=	"/^\/\*\*/,/\*\*\//!d;s,^ \*,,;s,^/,,"

post-extract:
.for L in ${LICENSE}
.for F in ${LICENSE_${L}_SRC}
	cd ${WRKSRC} && ${SED} -e ${LICENSE_${L}_REGEX} ${F} \
	    >> ${LICENSE_FILE_${L}}
.endfor
.endfor

.include <bsd.port.mk>
